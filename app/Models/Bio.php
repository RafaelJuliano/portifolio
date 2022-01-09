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
        $about = $this->explodeBioAboutByParagraphs($bio->about);

        $bioData = [
            'name' => $githubData->name,
            'email' => $bio->email,
            'phone' => $bio->phone,
            'about' => $about,
            'linkedin' => $bio->linkedin,
            'github' => $githubData->html_url,
            'occupation' => $bio->occupation,
            'company' => $githubData->company,            
            'avatar' => $githubData->avatar_url,
            'location' => $githubData->location
        ]; 
        return $bioData;     
    }

    private function getGithubData($apiUrl){

        $response = Http::get($apiUrl);

        return $response->object();
    }

    private function explodeBioAboutByParagraphs($bioAbout){
        $paragraphs = explode("\n", $bioAbout);
        $paragraphs = array_map(function($paragraph){
            return trim($paragraph);
        }, $paragraphs);
        $paragraphs = array_filter($paragraphs, function($paragraph){
            return !empty($paragraph);
        });
        return $paragraphs;
    }

   

    use HasFactory;
}
