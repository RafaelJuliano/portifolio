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

        if(!$skills)
        {
            return view('skills.addSkill');
        }
        else
        {
            return view('skills.skills', compact('skills'));
        }        
    }

    public function skillDetails($id)
    {
        
        $skill = \App\Models\Skill::find($id);   

        if(!$skill){
            abort(404, 'Skill not found');
        }
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

        try {
            $skill->save();
            return redirect()->route('skills');
        } catch (\Throwable $th) {
            abort(500, 'Error saving skill');
        }
        
    }

    public function deleteSkill(Request $request)
    {
        $skill = \App\Models\Skill::find($request->id);

        if(!$skill){
            abort(404, 'Skill not found');
        }

        try {
            $skill->delete();
            return redirect()->route('skills');
        } catch (\Throwable $th) {
            abort(500, 'Error deleting skill');
        }
        
    }

    public function updateSkill(Request $request)
    {
        $skill = \App\Models\Skill::find($request->id);

        if(!$skill){
            abort(404, 'Skill not found');
        }

        $skill->name = $request->name;
        $skill->svgLink = $request->svgLink;
        $skill->description = $request->description;

        try {
            $skill->save();
            return redirect()->route('skills');
        } catch (\Throwable $th) {
            abort(500, 'Error updating skill');
        }
    }
}
