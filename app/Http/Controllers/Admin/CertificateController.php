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
use App\Models\ModulProgress;
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
        $courseRegistration = CourseRegistration::where('certificate_id', $certificateId)->with('user')->firstOrFail();
        $course = $courseRegistration->course;

        $latestProgress = ModulProgress::whereIn('modul_id', $course->moduls->pluck('id'))
                               ->latest('updated_at')
                               ->first();


        // Pastikan pengguna yang login memiliki akses ke kursus ini
      
            return view('landing.pages.course.certificate', compact('course', 'latestProgress'));
       
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
    $instrukturs = $course->instrukturs->first();
    $instruktur = $instrukturs ? $instrukturs->first_name . ' ' . $instrukturs->last_name : 'Nama Instruktur Tidak Ditemukan';        
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
    $url = route('certificate.index', ['certificateId' => $certificateId]);

    $builder = new Builder(
        writer: new PngWriter(),
        data: $url,
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
    $heightInMM = $height * 0.264600;
    $orientation = ($widthInMM > $heightInMM) ? 'L' : 'P';

    // Mengaktifkan Auto Page Break
    $pdf->SetAutoPageBreak(true, 15);  // Jarak margin bawah
    $pdf->AddPage($orientation, [$widthInMM, $heightInMM]);

    // Menambahkan gambar template sertifikat
    $pdf->Image($pathToTemplate, 0, 0, $widthInMM, $heightInMM);

    // Nama Lengkap
    $pdf->SetFont('Helvetica', 'B', 60);
    $pdf->SetTextColor(34, 53, 134);
    $pdf->SetXY(110, 120); // Posisi Y untuk Nama
    $pdf->Cell(0, 10, $fullName, 0, 1, 'L');

    // Kursus
    $pdf->SetFont('Helvetica', '', 20);
    $pdf->SetTextColor(0, 102, 204);
    $pdf->SetXY(105, 155); // Posisi Y untuk Kursus
    $pdf->Cell(0, 10, $courseName, 0, 1, 'L');

    // Instruktur
    $pdf->SetFont('Helvetica', 'I', 20);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(200, 213); // Posisi Y untuk Instruktur
    $pdf->Cell(0, 10, $instruktur, 0, 1, 'L');

    // Tanggal
    $pdf->SetFont('Helvetica', 'I', 20);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->SetXY(70, 214); // Posisi Y untuk Tanggal
    $pdf->Cell(0, 10, $completionDate, 0, 1, 'L');

    // ID Sertifikat
    $pdf->SetFont('Helvetica', 'B', 15);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetXY(243, 14.5); // Posisi Y untuk ID Sertifikat
    $pdf->Cell(0, 10, $certificateId, 0, 1, 'L');

    // Tanda Tangan
    if ($signaturePath) {
        $pdf->Image($signaturePath, 195, 185, 45, 25); // Posisi Y untuk Tanda Tangan
    }

    // QR Code
    $pdf->Image($qrCodePath, 80, 185, 30, 30); // Posisi Y untuk QR Code

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
