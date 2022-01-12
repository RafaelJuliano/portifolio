<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {   

        $bio = new \App\Models\Bio;
        $projects = new \App\Models\Project;        
        $bioData = $bio->returnBio();
        $projects = $projects->returnProjects();
        
        return view('project', compact('projects', 'bioData'));       
    }

    public function listProjects()
    {
        $projects = \App\Models\Project::orderBy('created_at', 'desc')->get();

        if(!$projects)
        {
            return view('project.addProject');
        }
        else
        {
            return view('project.projects', compact('projects'));
        }       
    }

    public function projectDetails($id)
    {
        $project = \App\Models\Project::find($id);

        if(!$project){
            abort(404, 'Project not found');
        }
        return view('project.projectDetails', compact('project'));
    }

    public function openProjectadd()
    {
        return view('project.addProject');
    }

    public function addNewProject(Request $request)
    {

        $project = new \App\Models\Project([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'url' => $request->get('url'),
            'type' => $request->get('type'),
            'skilss' => $request->get('skilss'),
        ]);

        try {
            $project->save();
            return redirect('/projects')->with('success', 'Project has been added');
        } catch (\Throwable $th) {
            return redirect('/projects')->with('error', 'Project could not be added');
        }
    }

    public function deleteProject($id)
    {
        $project = \App\Models\Project::find($id);

        if(!$project){
            abort(404, 'Project not found');
        }

        try {
            $project->delete();
            return redirect('/projects')->with('success', 'Project has been deleted');
        } catch (\Throwable $th) {
            return redirect('/projects')->with('error', 'Project could not be deleted');
        }
    }

    public function updateProject(Request $request, $id)
    {
        $project = \App\Models\Project::find($id);

        if(!$project){
            abort(404, 'Project not found');
        }

        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->url = $request->get('url');
        $project->type = $request->get('type');
        $project->skilss = $request->get('skilss');

        try {
            $project->save();
            return redirect('/projects')->with('success', 'Project has been updated');
        } catch (\Throwable $th) {
            return redirect('/projects')->with('error', 'Project could not be updated');
        }
    }
}
