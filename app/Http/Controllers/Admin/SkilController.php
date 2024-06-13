<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Skil\StoreRequest;
use App\Http\Requests\Admin\Skil\UpdateRequest;
use App\Models\Skil;
use Illuminate\Http\Request;

class SkilController extends Controller
{
    public function index()
    {
        $skils = Skil::paginate(10);
        return view('admin.skils.index',compact('skils'));
    }
    public function create()
    {
        return view('admin.skils.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Skil::create($data);
        return redirect()->route('admin.skils.index')->with(['success' => 'Store Skil Successfully']);
    }
    public function edit($id)
    {
        $record = Skil::find($id);
        return view('admin.skils.edit',compact('record'));
    }
    public function update(UpdateRequest $request , $id)
    {
        $record = Skil::find($id);
        $data = $request->validated();
        $record->update([
            'name'        => $request->name        ? $data['name']        : $record->description,
            'description' => $request->description ? $data['description'] : $record->description
        ]);
        return redirect()->route('admin.skils.index')->with(['update' => 'Update Skil Successfully']);
    }
    public function delete($id)
    {
        $record = Skil::find($id);
        $record->delete();
        return redirect()->back()->with(['delete' => 'Delete Skil Successfully']);
    }
}
