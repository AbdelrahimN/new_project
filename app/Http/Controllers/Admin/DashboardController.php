<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::latest()->take(10)->whereHas('center')->get();
        return view('admin.dashboard',compact('students'));
    }
    public function profile()
    {
        $record = User::where('id',Auth::user()->id)->first();
        return view('admin.profile',compact('record'));
    }
    public function fetch()
    {
        $notifications = Notification::latest()->limit(10)->get();
        return response()->json($notifications);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.index');
    }
}
