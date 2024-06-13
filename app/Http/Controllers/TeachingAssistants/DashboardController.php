<?php

namespace App\Http\Controllers\TeachingAssistants;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teaching_Assistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::latest()->take(10)->whereHas('center')->get();
        return view('TeachingAssistants.dashboard',compact('students'));
    }
    public function profile()
    {
        $record = Teaching_Assistant::whereHas('center')->where('id',Auth::guard('Teaching_Assistant')->user()->id)->first();
        return view('TeachingAssistants.profile',compact('record'));
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('supervisor.index');
    }
}
