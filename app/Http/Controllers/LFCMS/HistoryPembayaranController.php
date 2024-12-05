<?php

namespace App\Http\Controllers\LFCMS;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\CourseRegistration;
use App\Http\Controllers\Controller;

class HistoryPembayaranController extends Controller
{
    public function historypembayaranCMS(Request $request)
    {
        // Check if invoice generation is requested
        if ($request->has('preview_invoice')) {
            return $this->generateInvoicePreview($request->input('preview_invoice'));
        }

        // Fetch the history data
        $history = CourseRegistration::where('registration_status', 'confirmed')->paginate(5);
        $totalConfirmed = CourseRegistration::where('registration_status', 'confirmed')->count();

        return view('lfcms.pages.pembayaran.pembayaran-history', compact('history', 'totalConfirmed'));
    }

    // Preview Invoice Method
    public function generateInvoicePreview($id)
    {
        $payment = CourseRegistration::find($id);
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment record not found');
        }

        // Generate PDF preview
        $pdf = PDF::loadView('lfcms.pages.pembayaran.invoice.invoice-history', compact('payment'));
        return $pdf->stream('invoice-' . $payment->order_id . '.pdf'); // Stream the PDF for preview
    }
}
