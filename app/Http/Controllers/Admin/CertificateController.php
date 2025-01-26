<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;
use App\Models\Course; // Pastikan model Course diimpor
use App\Models\CourseRegistration;

class CertificateController extends Controller
{
    public function show($courseId)
    {
        // Ambil data kursus berdasarkan ID
        $course = Course::findOrFail($courseId);

        // Pastikan pengguna yang login memiliki akses ke kursus ini
        if ($this->checkUserAccess($course)) {
            return view('landing.pages.course.certificate', compact('course'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke kursus ini.');
        }
    }

    // Fungsi untuk men-generate sertifikat dalam format PDF
    public function generateCertificate($courseId, $download = false)
    {
    // Ambil data kursus berdasarkan ID
    $course = Course::findOrFail($courseId);

    // Pastikan pengguna yang login memiliki akses ke kursus ini
    if (!$this->checkUserAccess($course)) {
        abort(403, 'Anda tidak memiliki akses ke kursus ini.');
        }

    $user = Auth::user(); // Ambil data pengguna yang login

    // Cari data course_registration untuk pengguna dan kursus terkait
    $courseRegistration = CourseRegistration::where('user_id', $user->id)
        ->where('course_id', $courseId)
        ->first();

    if (!$courseRegistration) {
        abort(404, 'Data pendaftaran kursus tidak ditemukan.');
    }

        $fullName = $user->first_name . ' ' . $user->last_name;
    $completionDate = now()->format('d F Y'); // Ambil tanggal saat ini
    $courseName = $course->name; // Nama kursus yang diambil dari database
    $certificateId = $courseRegistration->certificate_id; // Ambil certificate_id

    // Cek jika ada sertifikat dan ambil signature_path, jika tidak, set ke null
    $certificate = $course->certificate()->first(); // Assuming certificates is a relationship method on Course
        $signaturePath = null;

    // Check if the certificate exists and the signature_path is not null or empty
        if ($certificate && !empty($certificate->ttd)) {
            $ttd = trim($certificate->ttd, '"');
            $decodedSignature = json_decode($ttd);

            if (is_array($decodedSignature) && isset($decodedSignature[0])) {
                $signaturePath = $decodedSignature[0];
            }
        }

    // Ensure the signature file exists in storage
        if ($signaturePath && file_exists(public_path('storage/' . $signaturePath))) {
            $signaturePath = public_path('storage/' . $signaturePath);
        } else {
            $signaturePath = null;
        }

        // Buat instance PDF
        $pdf = new Fpdi();
        $pathToTemplate = public_path('storage/certificates/template.jpeg');
        list($width, $height) = getimagesize($pathToTemplate);
        $widthInMM = $width * 0.264583;
        $heightInMM = $height * 0.264583;
        $orientation = ($widthInMM > $heightInMM) ? 'L' : 'P';

        $pdf->AddPage($orientation, [$widthInMM, $heightInMM]);
        $pdf->Image($pathToTemplate, 0, 0, $widthInMM, $heightInMM);

        // Set text for user name
        $pdf->SetFont('Helvetica', 'B');
        $pdf->SetFontSize(60);
        $pdf->SetTextColor(34, 53, 134);
        $pdf->SetXY(110, 120);
        $pdf->Cell(0, 10, $fullName, 0, 1, 'L');

        // Set text for course name
        $pdf->SetFont('Helvetica');
        $pdf->SetFontSize(20);
        $pdf->SetTextColor(0, 102, 204);
        $pdf->SetXY(105, 155);
        $pdf->Cell(0, 10, $courseName, 0, 1, 'L');

        // Set text for completion date
        $pdf->SetFont('Helvetica', 'I');
        $pdf->SetFontSize(20);
        $pdf->SetTextColor(128, 128, 128);
        $pdf->SetXY(70, 209);
        $pdf->Cell(0, 10, $completionDate, 0, 1, 'L');

        // Set text for certificate ID
        $pdf->SetFont('Helvetica', 'B');
    $pdf->SetFontSize(16);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(243, 14.5);
        $pdf->Cell(0, 10, $certificateId, 0, 1, 'L');

    // If signature exists, add it to the certificate
        if ($signaturePath) {
        $signatureX = 195; // Horizontal position (from the left)
        $signatureY = 185; // Vertical position (from the top)
        $signatureWidth = 45; // Width of the signature image
        $signatureHeight = 25; // Height of the signature image

        $pdf->Image($signaturePath, $signatureX, $signatureY, $signatureWidth, $signatureHeight);
        }

        $pdf->SetDisplayMode('fullpage');
        $fileName = 'Certificate_' . $fullName . '.pdf';

        // If download is true, send as attachment
        if ($download) {
            return response()->make($pdf->Output('D', $fileName), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; fileName="' . $fileName . '"'
            ]);
        } else {
            return response()->make($pdf->Output('I', $fileName), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; fileName="' . $fileName . '"'
            ]);
        }
    }



    public function viewCertificate($courseId)
    {
        return $this->generateCertificate($courseId, false);
    }

    public function downloadCertificate($courseId)
    {
        return $this->generateCertificate($courseId, true);
    }

    // Fungsi untuk memeriksa apakah pengguna yang login memiliki akses ke kursus
    private function checkUserAccess($course)
    {
    $user = Auth::user();
    // Check if any of the course registrations have the user_id equal to the current user's id
    return $course->courseRegistrations->contains('user_id', $user->id);
    }

}
