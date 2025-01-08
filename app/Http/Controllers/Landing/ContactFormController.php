<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Rules\ReCaptcha;

class ContactFormController extends Controller
{
    public function submitContactForm(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'topic' => 'required',
            'phone' => 'required|numeric',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
  
        $input = $request->all();
  
        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}