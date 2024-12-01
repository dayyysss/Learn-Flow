<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;
use App\Models\Course; // Pastikan model Course diimpor

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
    $fullName = $user->first_name . ' ' . $user->last_name;
    $completionDate = now()->format('d F Y'); // Ambil tanggal saat ini
    $courseName = $course->name; // Nama kursus yang diambil dari database

    // Cek jika ada sertifikat dan ambil signature_path, jika tidak, set ke null
    $certificate = $course->certificate()->first(); // Assuming certificates is a relationship method on Course
    $signaturePath = null;
    
    // Check if the certificate exists and the signature_path is not null or empty
    if ($certificate && !empty($certificate->ttd)) {
        // Remove the outer quotes if they exist and decode the JSON
        $ttd = trim($certificate->ttd, '"');
        $decodedSignature = json_decode($ttd);

        // Ensure it's an array and contains a value
        if (is_array($decodedSignature) && isset($decodedSignature[0])) {
            $signaturePath = $decodedSignature[0];
        }
    }

    // Ensure the signature file exists in storage
    if ($signaturePath && file_exists(public_path('storage/' . $signaturePath))) {
        // Use the public path to the image in the storage folder
        $signaturePath = public_path('storage/' . $signaturePath);
    } else {
        $signaturePath = null; // If the signature doesn't exist, set to null
    }

    // Buat instance PDF
    $pdf = new Fpdi();
    $pathToTemplate = public_path('storage/certificates/template-certificate.png');
    list($width, $height) = getimagesize($pathToTemplate);
    $widthInMM = $width * 0.264583;
    $heightInMM = $height * 0.264583;
    $orientation = ($widthInMM > $heightInMM) ? 'L' : 'P';

    $pdf->AddPage($orientation, [$widthInMM, $heightInMM]);
    $pdf->Image($pathToTemplate, 0, 0, $widthInMM, $heightInMM);

    // Set text for user name
    $pdf->SetFont('Helvetica', 'B');
    $pdf->SetFontSize(70);
    $pdf->SetTextColor(0, 102, 204);
    $pdf->SetXY(40, 185);
    $pdf->Cell(0, 10, $fullName, 0, 1, 'L');

    // Set text for course name
    $pdf->SetFont('Helvetica', 'B');
    $pdf->SetFontSize(40);
    $pdf->SetTextColor(0, 102, 204);
    $pdf->SetXY(37, 240);
    $pdf->Cell(0, 10, $courseName, 0, 1, 'L');

    // Set text for completion date
    $pdf->SetFont('Helvetica', 'I');
    $pdf->SetFontSize(20);
    $pdf->SetTextColor(128, 128, 128);
    $pdf->SetXY(37, 280);
    $pdf->Cell(0, 10, $completionDate, 0, 1, 'L');

    // If signature exists, add it to the certificate
    if ($signaturePath) {
        // Adjust the position and size of the signature image
        $signatureX = 40; // Horizontal position (from the left)
        $signatureY = 300; // Vertical position (from the top)
        $signatureWidth = 50; // Width of the signature image
        $signatureHeight = 30; // Height of the signature image
    
        // Place the signature image on the certificate
        $pdf->Image($signaturePath, $signatureX, $signatureY, $signatureWidth, $signatureHeight);
        
        // Draw a line below the signature
        $lineStartX = $signatureX; // Start of the line, aligned with the signature
        $lineStartY = $signatureY + $signatureHeight + 2; // Position 2mm below the signature
        $lineEndX = $signatureX + $signatureWidth; // End of the line, aligned with the signature width
        $lineEndY = $lineStartY; // The line's Y position is the same as the start Y position
        
        // Draw the line
        $pdf->SetLineWidth(0.3); // Set line thickness
        $pdf->Line($lineStartX, $lineStartY, $lineEndX, $lineEndY); // Draw line from start to end
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
