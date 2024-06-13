<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('supervisor.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:supervisors,email',
            'password' => 'required'
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('supervisor')->attempt($data)) {
            return redirect()->intended('/supervisor/dashboard');
        }
    }
}
