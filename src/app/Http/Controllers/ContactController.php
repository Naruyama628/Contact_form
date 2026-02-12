<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function contact() {
        return view('contact');
    }

    public function confirm(Request $request) {
        $content = $request->all();
        return view('confirm', compact('content'));
    }

    public function thanks(request $request) {
        return view('thanks');
    }
    
    public function admin() {
        return view('admin');
    }

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function correction(Request $request) {
        return redirect('/')->withInput();
    }
}
