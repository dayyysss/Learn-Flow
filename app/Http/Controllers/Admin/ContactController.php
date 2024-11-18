<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
// use Scyllaly\HCaptcha\Facades\HCaptcha;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index()
    {
        // Mengambil semua data kontak dengan pagination
        $contacts = Contact::paginate(10);
    
        // Menampilkan view dan mengirimkan data kontak ke view
        return view('admin.contact.index', compact('contacts'));
    }    

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $this->validate($request, [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'topic'   => 'required|string|max:255',
            'phone'   => 'required|string|max:15',
            'message' => 'required|string',
            // 'h-captcha-response' => ['hcaptcha'],
        ]);
    
        // Menyimpan data ke dalam tabel contacts
        $contact = Contact::create($request->all());
    
        // Mengirim email ke admin (atau siapapun penerima emailnya)
        Mail::to('admin@example.com')->send(new ContactFormSubmitted($contact));
    

        return response()->json(['success' => true, 'message' => 'Pesan berhasil dikirim cuy']);
    }    

    /**
     * Remove the specified contact from storage.
     */
    public function destroy($id)
    {
        // Mencari contact berdasarkan id
        $contact = Contact::findOrFail($id);

        // Menghapus contact
        $contact->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('contact.index')->with('success', 'Kontak berhasil dihapus');
    }

    public function reply(Request $request, $id)
    {
        // Validasi data dari form balasan
        $this->validate($request, [
            'reply_message' => 'required|string',
        ]);
    
        // Mendapatkan data kontak
        $contact = Contact::findOrFail($id);
    
        // Mengirim email balasan ke pengirim
        Mail::to($contact->email)->send(new ContactFormSubmitted($contact, $request->reply_message));
    
        // Redirect kembali ke halaman kontak dengan pesan sukses
        return redirect()->route('contact.index')->with('success', 'Balasan berhasil dikirim ke ' . $contact->email);
    }

    public function bulkDelete(Request $request)
    {
        // Retrieve the array of IDs from the request
        $ids = $request->input('ids');

        // Check if IDs are provided
        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada pesan yang dipilih.'], 400);
        }

        // Retrieve the contact by the given IDs
        $contact = Contact::whereIn('id', $ids)->get();


        // Delete the contacts from the database
        Contact::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Contact berhasil dihapus.']);
    }
}
