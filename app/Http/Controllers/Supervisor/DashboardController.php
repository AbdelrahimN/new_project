<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::latest()->take(10)->get();
        return view('supervisor.dashboard',compact('students'));
    }
    public function profile()
    {
        $record = Supervisor::whereHas('center')->where('id',Auth::guard('supervisor')->user()->id)->first();
        return view('supervisor.profile',compact('record'));
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('supervisor.index');
    }
}
