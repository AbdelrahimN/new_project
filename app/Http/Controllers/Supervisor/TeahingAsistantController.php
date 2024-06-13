<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeachingAssistant\StoreRequest;
use App\Http\Requests\Admin\TeachingAssistant\UpdateRequest;
use App\Models\Teaching_Assistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeahingAsistantController extends Controller
{
    public function index()
    {
        $TeachingAssistants = Teaching_Assistant::paginate(10);
        return view('supervisor.teaching_assistants.index',compact('TeachingAssistants'));
    }

}
