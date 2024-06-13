<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Traits\imageTrait;
use App\Models\Student;
use App\Models\Student_Team;
use App\Models\Student_Team_member;
use App\Models\StudentDocument;
use App\Models\StudentProject;
use App\Models\StudentSkil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    use imageTrait;
    public function index()
    {
        return view('site.home');
    }
    public function profile()
    {
        $record = Student::whereHas('center')->where('id', Auth::guard('student')->user()->id)->first();
        $team = Student_Team::whereHas('teaching_assistant')->where('student_id', Auth::guard('student')->user()->id)->first();
        $doc = StudentDocument::whereHas('student')->where('student_id',Auth::guard('student')->user()->id)->first();
        $skils = StudentSkil::whereHas('skil')->whereHas('student')->where('student_id',Auth::guard('student')->user()->id)->get();
        return view('site.profile', compact('record', 'team','doc','skils'));
    }
    public function restPassword()
    {
        return view('site.restPassword');
    }
    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'newPassword' => 'required',
            'comfiarm_password' => 'required|same:newPassword'
        ]);
        $record = Student::where('id',Auth::guard('student')->user()->id)->first();
        $HashPassword = Hash::make($data['newPassword']);
        $record->update([
            'password' => $HashPassword
        ]);
        if($record) {
            Session::flush();
            Auth::logout();
            return redirect()->route('site.index');
        }
    }
    public function uploadDoc(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'numeric',
            'doc' => 'required'
        ]);
        $data['student_id'] = Auth::guard('student')->user()->id;
        $data['doc'] = $this->saveImage($request->doc , 'uploads/images/students/documents');
        StudentDocument::create($data);
        return redirect()->back();
    }
    public function project($id)
    {
        $record = Student_Team::find($id);
        $project = StudentProject::where('student_team_id', $record->id)->first();
        $students = Student::where('center_id', Auth::guard('student')->user()->center_id)->where('id', '!=', Auth::guard('student')->user()->id)->get();
        $student_team_member = Student_Team_member::whereHas('member')->where('student_team_id', $record->id)->get();
        return view('site.project', compact('record', 'project', 'students', 'student_team_member'));
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('site.index');
    }
}
