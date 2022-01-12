<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Bio extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'about', 'linkedin', 'github', 'occupation', 'location', 'avatar'];



    public function returnBio(){
        
        try {
            $bio = $this->first();
            //$githubData = $this->getGithubData($bio->github);
            $about = $this->explodeBioAboutByParagraphs($bio->about);
            $skills = Skill::orderBy('created_at', 'asc')->get();

            $bioData = [
                'name' => 'Rafael', //$githubData->name
                'email' => $bio->email,
                'phone' => $bio->phone,
                'about' => $about,
                'linkedin' => $bio->linkedin,
                'github' => 'github.com', //$githubData->html_url
                'occupation' => $bio->occupation,
                'company' => 'vhsys', //$githubData->company            
                'avatar' => 'https://www.devmedia.com.br/imagens/fotoscolunistas/773667_20210210112029.jpg', //$githubData->avatar_url
                'location' => 'São Paulo', //$githubData->location
                'skills' => $skills
            ]; 
            return $bioData;     
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong');
        }
        
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
