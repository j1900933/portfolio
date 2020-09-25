<?php

namespace App\Http\Controllers;

use App\Models\EmploymentStatus;
use App\Models\EngineerSkill;
use Illuminate\Http\Request;
use App\Models\Engineer;
use App\Models\HumanSkill;
use App\Models\InHouseStatus;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Support\Facades\Log;

class EngineerController extends Controller
{
    public function index(Request $request)
    {
        $query = Engineer::query();
        $keyword = $request->input('keyword');
        if(!empty($keyword)){
            $query->where('address', 'like', '%' . $keyword . '%')->orWhere('last_name', 'like', '%' . $keyword . '%')->orWhere('first_name', 'like', '%' . $keyword . '%')->orWhere('gender', 'like', '%' . $keyword . '%');
        };

        $employmentSqueeze = $request->input('employmentStatus');
        if($employmentSqueeze != ""){
            $query->where('employment_status_id', $employmentSqueeze);
        };

        $inHouseSqueeze = $request->input('inHouseStatus');
        if($inHouseSqueeze != ""){
            $query->where('in_house_status_id', $inHouseSqueeze);
        };

        $engineerSkillSqueeze = $request->input('engineerSkill');
        if($engineerSkillSqueeze != ""){
            $query->where('engineer_skill_id', $engineerSkillSqueeze);
        };
        
        $humanSkillSqueeze = $request->input('humanSkill');
        if($humanSkillSqueeze != ""){
            $query->where('human_skill_id', $humanSkillSqueeze);
        };

        $engineers = $query->sortable()->latest()->Paginate(3);
        $employmentStatuses = EmploymentStatus::all();
        $engineerSkills = EngineerSkill::all();
        $humanSkills = HumanSkill::all();
        $inHouseStatuses = InHouseStatus::all();
        return view('engineers.index', compact('engineers', 'employmentStatuses', 'engineerSkills', 'humanSkills', 'inHouseStatuses'));


    }

    public function show(Engineer $engineer)
    {
        return view('engineers.show', compact('engineer'));
    }

    public function create()
    {
        return view('engineers.create');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:20',
            'last_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'birth_date' => 'required|date_format:"Y-m-d"|before:today',
            'email' => 'required|email|unique:engineers',
            'tel' => 'regex:/^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$/',
            'prefecture' => 'required|string',
            'after_address' => 'required',
            'postal_code' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
            'closest_station' => 'required|string',
            'educational_background' => 'required|string',
            'resume' => 'file|mimes:pdf', 
            'job_history_sheet' => 'file|mimes:pdf',
        ]);

        $data = $request->except('resume', 'job_history_sheet');
        $resume_file = $request->file('resume');
        $job_file = $request->file('job_history_sheet');

       if($request->hasFile('resume') && $resume_file->isValid()){
            $resume_path = $resume_file->store('public');
            $read_resume_path = str_replace('public/', 'storage/', $resume_path);
        }

        if($request->hasFile('job_history_sheet') && $job_file->isValid()){
            $job_path = $job_file->store('public');
            $read_job_path = str_replace('public/', 'storage/', $job_path);
        }
        
        $engineer = array (
            'data' => $data,
            'resume_path' => isset($resume_path) ?  : '',
            'read_resume_path' => isset($read_resume_path) ?  : '',
            'job_path' => isset($job_path) ?  : '',
            'read_job_path' => isset($read_job_path) ?  : '',
        );

        $request->session()->put('engineer', $engineer);

        return view('engineers.confirm', compact('resume_file', 'job_file', 'data')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:20',
            'last_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'gender' => 'required',
            'birth_date' => 'required|date_format:"Y-m-d"|before:today',
            'email' => 'required|email|unique:engineers',
            'tel' => 'regex:/^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$/',
            'prefecture' => 'required|string',
            'after_address' => 'required',
            'postal_code' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
            'closest_station' => 'required|string',
            'educational_background' => 'required|string',
            'resume' => 'file|mimes:pdf', 
            'job_history_sheet' => 'file|mimes:pdf',
        ]);

       
        if($request->action == 'back')return redirect()->route('engineers.create')->withInput();
        
        $engineer = new Engineer;
        $data = $request->session()->get('engineer');
        $resume_path = $data['read_resume_path'];
        $job_path = $data['read_job_path'];

        $validated = $request->validate([
            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:20',
            'last_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'gender' => 'required',
            'birth_date' => 'required|date_format:"Y-m-d"|before:today',
            'email' => 'required|email|unique:engineers',
            'tel' => 'regex:/^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$/',
            'prefecture' => 'required|string',
            'after_address' => 'required',
            'postal_code' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
            'closest_station' => 'required|string',
            'educational_background' => 'required|string',
            'resume' => 'file|mimes:pdf', 
            'job_history_sheet' => 'file|mimes:pdf',
        ]);
        unset($validated['_token']);
        $engineer->fill($validated);
        $engineer->address = $request->prefecture; 
        $engineer->address .= $request->city; 
        $engineer->address .= $request->town; 
        $engineer->address .= $request->after_address; 
        $engineer->resume = $resume_path;
        $engineer->job_history_sheet = $job_path;
        $engineer->save();
        return redirect()->route('engineers.index');
        
    }

    public function edit(Engineer $engineer)
    {
        return view('engineers.edit', compact('engineer'));
    }

    public function update(Request $request, Engineer $engineer)
    {
        $request->validate([
            'last_name' => 'required|string|max:10',
            'first_name' => 'required|string|max:10',
            'last_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'gender' => 'required',
            'birth_date' => 'required|date_format:"Y-m-d"|before:today',
            'email' => 'required|email',
            'tel' => 'regex:/^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$/',
            'postal_code' => 'regex:/^[0-9]{3}-[0-9]{4}$/',
            'closest_station' => 'required|string',
            'educational_background' => 'required|string',
            'resume' => 'file|mimes:pdf',
            'job_history_sheet' => 'file|mimes:pdf',
        ]);

        $upload_resume = $request->file('resume');
        $upload_job = $request->file('job_history_sheet');

        if(!empty($upload_resume)){
            $resume_path = $upload_resume->store('public');
            $read_resume_path = str_replace('public/', 'storage/', $resume_path);
        }

        if(!empty($upload_job)){
            $job_path = $upload_job->store('public');
            $read_job_path = str_replace('public/', 'storage/', $job_path);
        }

        $validated = $request->validate([
            'last_name' => 'required|string|max:10',
            'first_name' => 'required|string|max:10',
            'last_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_furigana' => 'required|string|max:20|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'gender' => 'required',
            'birth_date' => 'required|date_format:"Y-m-d"|before:today',
            'email' => 'required|email',
            'tel' => 'regex:/^[0-9]{2,4}-[0-9]{3,4}-[0-9]{3,4}$/',
            'postal_code' => 'regex:/^[0-9]{3}-[0-9]{4}$/',
            'closest_station' => 'required|string',
            'educational_background' => 'required|string',
            'resume' => 'file|mimes:pdf',
            'job_history_sheet' => 'file|mimes:pdf',
        ]);//all()はだめ $validated = $request->validate(...)
        $engineer->fill($validated); //fillじゃis_admin守れない
        $engineer->resume = isset($read_resume_path) ? $read_resume_path : ''; //null合体演算子
        $engineer->job_history_sheet = isset($read_job_path) ? $read_job_path : '';
        $engineer->save();
        return redirect()->route('engineers.show' , $engineer);
        
    }

    public function destroy(Engineer $engineer)
    {
        $engineer->delete();

        return redirect()->route('engineers.index');
    }

    public function indexUpdate(Request $request)
    {
        $engineer = Engineer::find($request->id);
        $engineer->fill($request->all());
        $engineer->save();//バリデーションをやる（クライアントサイドから意図しない入力される）
        return response()->json($engineer);
    }

    // public function squeeze(Request $request)
    // {
    //     $engineers = Engineer::query();
    //     $employmentSqueeze = $request->input('employment_status_id');
    //     $engineers = $engineers->where('employment_status_id', $employmentSqueeze)->paginate(3);

    //     $employmentStatuses = EmploymentStatus::all();
    //     $engineerSkills = EngineerSkill::all();
    //     $humanSkills = HumanSkill::all();
    //     $inHouseStatuses = InHouseStatus::all();
    //     return view('engineers.index', compact('engineers', 'employmentStatuses', 'engineerSkills', 'humanSkills', 'inHouseStatuses'));
    //     // return response()->json($squeeze);
    // }
}