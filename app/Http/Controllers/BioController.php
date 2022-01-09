<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $bio = \App\Models\Bio::first();
        return(view('bio', compact('bio')));
    }

    public function updateBio(Request $request){
        $bio = \App\Models\Bio::first();
        $bio->update($request->all());
        return(redirect()->route('home', compact('bio')));
    }
}
