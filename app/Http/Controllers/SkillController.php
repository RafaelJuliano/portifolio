<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $skills = \App\Models\Skill::all();
        return view('skill.skills', compact('skills'));
    }

    public function skillDetails($id)
    {
        $skill = \App\Models\Skill::find($id);
        return view('skill.skillDetails', compact('skill'));
    }

    public function openSkillAdd(){
        return view('skill.addSkill');
    }

    public function addNewSkill(Request $request)    
    {
        $skill = new \App\Models\Skill;
        $skill->name = $request->name;
        $skill->svgLink = $request->svgLink;
        $skill->description = $request->description;
        $skill->save();
        return redirect()->route('skills');
    }

    public function deleteSkill(Request $request)
    {
        $skill = \App\Models\Skill::find($request->id);
        $skill->delete();
        return redirect()->route('skills');
    }

    public function updateSkill(Request $request)
    {
        $skill = \App\Models\Skill::find($request->id);
        $skill->name = $request->name;
        $skill->svgLink = $request->svgLink;
        $skill->description = $request->description;
        $skill->save();
        return redirect()->route('skills');
    }
}
