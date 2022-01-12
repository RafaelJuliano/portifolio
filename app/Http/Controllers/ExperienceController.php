<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {

        $bio = new \App\Models\Bio;        
        $bioData = $bio->returnBio();

        $experiences = \App\Models\Experience::orderBy('start_date', 'desc')->get();
        return view('experience', compact('experiences', 'bioData'));
    }

    public function listExperiences()
    {
        $experiences = \App\Models\Experience::orderBy('start_date', 'desc')->get();

        if(!$experiences)
        {
            return view('experience.addExperience');
        }
        else
        {
            return view('experience.experiences', compact('experiences'));
        }       
    }

    public function experienceDetails($id)
    {
        $experience = \App\Models\Experience::find($id);

        if(!$experience){
            abort(404, 'Experience not found');
        }
        return view('experience.experienceDetails', compact('experience'));
    }

    public function openExperienceadd()
    {
        return view('experience.addExperience');
    }

    public function addNewExperience(Request $request)
    {

        $experience = new \App\Models\Experience([
            'description' => $request->get('description'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'company' => $request->get('company'),
            'location' => $request->get('location'),
            'position' => $request->get('position'),
        ]);

        try {
            $experience->save();
            return redirect('/experiences')->with('success', 'Experience has been added');
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong');
        }
        
    }

    public function updateExperience(Request $request, $id)
    {
        $experience = \App\Models\Experience::find($id);

        if(!$experience){
            abort(404, 'Experience not found');
        }

        $experience->description = $request->get('description');
        $experience->start_date = $request->get('start_date');
        $experience->end_date = $request->get('end_date');
        $experience->company = $request->get('company');
        $experience->location = $request->get('location');
        $experience->position = $request->get('position');

        try {
            $experience->save();
            return redirect('/experiences')->with('success', 'Experience has been updated');
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong');
        }
        
    }

    public function deleteExperience(Request $request, $id)
    {
        $experience = \App\Models\Experience::find($id);

        if(!$experience){
            abort(404, 'Experience not found');
        }

        try {
            $experience->delete();
            return redirect('/experiences')->with('success', 'Experience has been deleted');
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong');
        }
        
    }

}
