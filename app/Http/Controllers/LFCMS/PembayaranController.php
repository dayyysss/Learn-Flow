<?php

namespace App\Http\Controllers\LFCMS;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\CourseRegistration;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function pembayaranCMS(Request $request)
    {
        // Periksa apakah ada parameter untuk invoice berdasarkan order_id
        if ($request->has('order_id')) {
            $orderId = $request->get('order_id');
            return $this->generateInvoice($orderId);
        }

        // Hitung total transaksi dengan status 'confirmed'
        $totalTransactions = CourseRegistration::where('registration_status', 'confirmed')->sum('harga');

        // Hitung jumlah pengguna yang statusnya 'confirmed'
        $totalConfirmedUsers = CourseRegistration::where('registration_status', 'confirmed')->count();

        // Tampilkan daftar pembayaran dengan pagination
        $pembayaran = CourseRegistration::with('course')->paginate(5);

        // Kirim data ke view
        return view('lfcms.pages.pembayaran.pembayaran', compact('pembayaran', 'totalTransactions', 'totalConfirmedUsers'));
    }


    protected function generateInvoice($orderId)
    {
        $pembayaran = CourseRegistration::with('course')->where('order_id', $orderId)->firstOrFail();

        $data = [
            'order_id' => $pembayaran->order_id,
            'date' => $pembayaran->order_date,
            'course_name' => $pembayaran->course->name,
            'amount' => $pembayaran->harga,
            'status' => $pembayaran->registration_status,
            'customer_name' => $pembayaran->user->name,
        ];

        $pdf = Pdf::loadView('lfcms.pages.pembayaran.invoice.invoice', $data);

        // Cetak atau tampilkan invoice
        return $pdf->stream("invoice-{$pembayaran->order_id}.pdf");
    }

}
