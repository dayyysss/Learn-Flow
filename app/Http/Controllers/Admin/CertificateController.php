<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\Image\Png;
use App\Models\Course;
use App\Models\CourseRegistration;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class CertificateController extends Controller
{
    public function show($certificateId)
    {
        // Ambil data registrasi kursus berdasarkan certificate_id
        $courseRegistration = CourseRegistration::where('certificate_id', $certificateId)->firstOrFail();
        $course = $courseRegistration->course;

        // Pastikan pengguna yang login memiliki akses ke kursus ini
      
            return view('landing.pages.course.certificate', compact('course'));
       
    }

    public function generateCertificate($certificateId, $download = false)
    {
        // Ambil data registrasi kursus berdasarkan certificate_id
        $courseRegistration = CourseRegistration::where('certificate_id', $certificateId)->firstOrFail();
        $course = $courseRegistration->course;

        $user = $courseRegistration->user;
        $fullName = $user->first_name . ' ' . $user->last_name;
        $completionDate = now()->format('d F Y');
        $courseName = $course->name;
        $certificateId = $courseRegistration->certificate_id;

        $certificate = $course->certificate()->first();
        $signaturePath = null;
        if ($certificate && !empty($certificate->ttd)) {
            $ttd = trim($certificate->ttd, '"');
            $decodedSignature = json_decode($ttd);
            if (is_array($decodedSignature) && isset($decodedSignature[0])) {
                $signaturePath = $decodedSignature[0];
            }
        }

        if ($signaturePath && file_exists(public_path('storage/' . $signaturePath))) {
            $signaturePath = public_path('storage/' . $signaturePath);
        } else {
            $signaturePath = null;
        }

        // Generate QR Code using Endroid QR Code Builder
        $builder = new Builder(
            writer: new PngWriter(),
            data: 'http://127.0.0.1:8000/certificate/' . $certificateId,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            labelText: 'Scan me!',
            labelFont: new OpenSans(20),
            labelAlignment: LabelAlignment::Center
        );

        $result = $builder->build();
        $qrCodePath = sys_get_temp_dir() . '/qrcode.png';
        file_put_contents($qrCodePath, $result->getString());

        $pdf = new Fpdi();
        $pathToTemplate = public_path('storage/certificates/template.jpeg');
        if (!file_exists($pathToTemplate)) {
            abort(404, 'Template sertifikat tidak ditemukan.');
        }

        list($width, $height) = getimagesize($pathToTemplate);
        $widthInMM = $width * 0.264583;
        $heightInMM = $height * 0.264583;
        $orientation = ($widthInMM > $heightInMM) ? 'L' : 'P';

        $pdf->AddPage($orientation, [$widthInMM, $heightInMM]);
        $pdf->Image($pathToTemplate, 0, 0, $widthInMM, $heightInMM);

        $pdf->SetFont('Helvetica', 'B', 60);
        $pdf->SetTextColor(34, 53, 134);
        $pdf->SetXY(110, 120);
        $pdf->Cell(0, 10, $fullName, 0, 1, 'L');

        $pdf->SetFont('Helvetica', '', 20);
        $pdf->SetTextColor(0, 102, 204);
        $pdf->SetXY(105, 155);
        $pdf->Cell(0, 10, $courseName, 0, 1, 'L');

        $pdf->SetFont('Helvetica', 'I', 20);
        $pdf->SetTextColor(128, 128, 128);
        $pdf->SetXY(70, 209);
        $pdf->Cell(0, 10, $completionDate, 0, 1, 'L');

        $pdf->SetFont('Helvetica', 'B', 15);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetXY(243, 14.5);
        $pdf->Cell(0, 10, $certificateId, 0, 1, 'L');

        if ($signaturePath) {
            $pdf->Image($signaturePath, 195, 185, 45, 25);
        }

        // Add QR Code to the certificate
        $pdf->Image($qrCodePath, 80, 180, 30, 30);

        $pdf->SetDisplayMode('fullpage');
        $fileName = 'Certificate_' . $fullName . '.pdf';

        if ($download) {
            return response()->make($pdf->Output('D', $fileName), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
            ]);
        } else {
            return response()->make($pdf->Output('I', $fileName), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $fileName . '"'
            ]);
        }
    }

    public function viewCertificate($certificateId)
    {
        return $this->generateCertificate($certificateId, false);
    }

    public function downloadCertificate($certificateId)
    {
        return $this->generateCertificate($certificateId, true);
    }

    // Fungsi untuk memeriksa apakah pengguna yang login memiliki akses ke kursus
    private function checkUserAccess($courseRegistration)
    {
        $user = Auth::user();
        // Periksa apakah user yang login terkait dengan course registration ini
        return $courseRegistration->user_id == $user->id;
    }
}
