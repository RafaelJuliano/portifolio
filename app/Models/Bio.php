<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Bio extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'about', 'linkedin', 'github', 'occupation', 'location', 'avatar'];



    public function returnBio(){
        
        $bio = $this->first();
        $githubData = $this->getGithubData($bio->github);

        $bioData = [
            'name' => $githubData->name,
            'email' => $bio->email,
            'phone' => $bio->phone,
            'about' => $githubData->bio,
            'linkedin' => $bio->linkedin,
            'github' => $githubData->html_url,
            'occupation' => $githubData->company,            
            'avatar' => $githubData->avatar_url,
            'location' => $githubData->location
        ]; 
        return $bioData;     
    }

    private function getGithubData($apiUrl){

        $response = Http::get($apiUrl);

        return $response->object();
    }

    use HasFactory;
}
