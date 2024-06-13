<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Skil;
use App\Models\StudentSkil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkilController extends Controller
{
    public function create()
    {
        $skils = Skil::all();
        return view('site.create_skil',compact('skils'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'skil_id.*' => 'required|not_in:Select Skils'
        ]);
        $studentId = Auth::guard('student')->user()->id;

        foreach($data['skil_id'] as $skilId) {
            StudentSkil::create([
                'student_id' => $studentId,
                'skil_id'    => $skilId
            ]);
        }
        return redirect()->route('site.profile');
    }
    public function edit($id)
    {
        $skils = Skil::all();
        $record = StudentSkil::find($id);
        return view('site.edit_skil',compact('skils','record'));
    }
    public function update(Request $request , $id)
    {
        $data = $request->validate([
            'skil_id' => 'required|not_in:Select Skils'
        ]);
        $record = StudentSkil::find($id);
        $record->update([
            'skil_id' => $request->skil_id ? $data['skil_id'] : $record->skil_id
        ]);
        return redirect()->route('site.profile');
    }
    public function delete($id)
    {
        $record = StudentSkil::find($id);
        $record->delete();
        return redirect()->back();
    }
}
