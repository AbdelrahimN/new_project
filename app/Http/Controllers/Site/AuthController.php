<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use App\Http\Requests\Site\RegisterRequest;
use App\Http\Traits\imageTrait;
use App\Models\Center;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use imageTrait;
    public function register()
    {
        $centers = Center::all();
        return view('site.register',compact('centers'));
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->saveImage($request->image ,'uploads/images/students');
        Student::create($data);
        return redirect()->route('site.index')->with(['register' => 'Register Successfully']);
    }
    public function index()
    {
        return view('site.index');
    }
    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('student')->attempt($data)) {
            return redirect()->intended('/site/home');
        }
    }
}
