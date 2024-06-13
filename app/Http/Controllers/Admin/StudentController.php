<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Student\StoreRequest;
use App\Http\Requests\Admin\Student\UpdateRequest;
use App\Http\Traits\imageTrait;
use App\Models\Center;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{
    use imageTrait;
    public function index()
    {
        $students = Student::whereHas('center')->paginate(10);
        return view('admin.students.index',compact('students'));
    }
    public function create()
    {
        $centers = Center::all();
        return view('admin.students.create',compact('centers'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->saveImage($request->image ,'uploads/images/students');
        Student::create($data);
        return redirect()->route('admin.students.index')->with(['success' => 'Store Student Successfully']);
    }
    public function downloadPDF($id)
    {
        $record = StudentDocument::whereHas('student')->where('student_id',$id)->first();
        $filePath = public_path("uploads/images/students/documents/".$record->doc);
        if (File::exists($filePath)) {
            return Response::download($filePath);
        }
        return redirect()->route('admin.students.index')->with(['success' => 'Download Document Successfully']);
    }
    public function edit($id)
    {
        $record = Student::find($id);
        $centers = Center::all();
        return view('admin.students.edit',compact('record','centers'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Student::find($id);
        $data = $request->validated();
        if(request()->hasFile('image')) {
            File::delete('uploads/images/students/'.$record->image);
        }
        if(isset($request->image)) {
            $data['image'] = $this->saveImage($request->image,'uploads/images/students');
        }
        $record->update([
            'center_id'     => $request->center_id      ? $data['center_id']      : $record->center_id,
            'name'          => $request->name           ? $data['name']           : $record->name,
            'university_id' => $request->university_id  ? $data['university_id']  : $record->university_id,
            'email'         => $request->email          ? $data['email']          : $record->email,
            'phone'         => $request->phone          ? $data['phone']          : $record->phone,
            'image'         => $request->image          ? $data['image']          : $record->image,
        ]);
        return redirect()->route('admin.students.index')->with(['update' => 'Update Student Successfully']);
    }
    public function delete($id)
    {
        $record = Student::find($id);
        $path = 'uploads/images/students/'.$record->image;
        if(File::exists($path)) {
            File::delete('uploads/images/students/'.$record->image);
        }
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Student Successfully']);
    }
}
