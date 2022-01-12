<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificadeController extends Controller
{
    public function index()
    {

        $bio = new \App\Models\Bio;
        $bioData = $bio->returnBio();
        $certificades = \App\Models\Certificade::orderBy('end_date', 'desc')->get();
        return view('certificade', compact('certificades', 'bioData'));
    }

    public function listCertificades()
    {
        $certificades = \App\Models\Certificade::orderBy('end_date', 'desc')->get();

        if(!$certificades)
        {
            return view('certificade.addCertificade');
        }
        else
        {
            return view('certificade.certificades', compact('certificades'));
        }       
    }

    public function certificadeDetails($id)
    {
        $certificade = \App\Models\Certificade::find($id);

        if(!$certificade){
            abort(404, 'Certificade not found');
        }
        return view('certificade.certificadeDetails', compact('certificade'));
    }

    public function openCertificadeadd()
    {
        return view('certificade.addCertificade');
    }

    public function addNewCertificade(Request $request)
    {

        $certificade = new \App\Models\Certificade([
            'name' => $request->get('name'),
            'url' => $request->get('url'),
            'institution' => $request->get('institution'),
            'hours' => $request->get('hours'),
            'type' => $request->get('type'),
            'end_date' => $request->get('end_date'),
        ]);

        try {
            $certificade->save();
            return redirect('/certificades')->with('success', 'Certificade has been added');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/certificades')->with('error', 'Certificade has not been added');
        }
    }

    public function deleteCertificade($id)
    {
        $certificade = \App\Models\Certificade::find($id);

        if(!$certificade){
            abort(404, 'Certificade not found');
        }

        try {
            $certificade->delete();
            return redirect('/certificades')->with('success', 'Certificade has been deleted');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/certificades')->with('error', 'Certificade has not been deleted');
        }
    }

    public function updateCertificade(Request $request)
    {
        $certificade = \App\Models\Certificade::find($request->id);

        if(!$certificade){
            abort(404, 'Certificade not found');
        }

        $certificade->name = $request->name;
        $certificade->url = $request->url;
        $certificade->institution = $request->institution;
        $certificade->hours = $request->hours;
        $certificade->type = $request->type;
        $certificade->end_date = $request->end_date;

        try {
            $certificade->save();
            return redirect('/certificades')->with('success', 'Certificade has been updated');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/certificades')->with('error', 'Certificade has not been updated');
        }
    }

}
