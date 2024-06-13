<?php

namespace App\Http\Controllers\TeachingAssistants;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('TeachingAssistants.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:teaching__assistants,email',
            'password' => 'required'
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('Teaching_Assistant')->attempt($data)) {
            return redirect()->intended('/teachingAssistant/dashboard');
        }
    }
}
