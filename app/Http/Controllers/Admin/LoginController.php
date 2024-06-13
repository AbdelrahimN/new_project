<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Supervisor;
use App\Models\Teaching_Assistant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function with()
    {
        return view('admin.with');
    }
    public function index()
    {
        return view('admin.index');
    }
    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::where('email',$request->email)->first();
        $supervisor = Supervisor::where('email',$request->email)->first();
        $Teaching_Assistant = Teaching_Assistant::where('email',$request->email)->first();
        if (isset($user) && Hash::check($data['password'], $user->password)) {
            if (Auth::guard('web')->attempt($data)) {
                return redirect()->intended('/admin/dashboard');
            }
        } elseif (isset($supervisor) && Hash::check($data['password'], $supervisor->password)) {
            if (Auth::guard('supervisor')->attempt($data)) {
                return redirect()->intended('/supervisor/dashboard');
            }
        } elseif (isset($Teaching_Assistant) && Hash::check($data['password'], $Teaching_Assistant->password)) {
            if (Auth::guard('Teaching_Assistant')->attempt($data)) {
                return redirect()->intended('/teachingAssistant/dashboard');
            }
        }

    }
}
