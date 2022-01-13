<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Bio extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'about', 'linkedin', 'github', 'occupation', 'location', 'avatar', 'company'];



    public function returnBio(){
        
        try {
            $bio = $this->first();            
            $about = $this->explodeBioAboutByParagraphs($bio->about);
            $skills = Skill::orderBy('created_at', 'asc')->get();

            $bioData = [
                'name' => $bio->name,
                'email' => $bio->email,
                'phone' => $bio->phone,
                'about' => $about,
                'linkedin' => $bio->linkedin,
                'github' => $bio->github,
                'occupation' => $bio->occupation,
                'company' => $bio->company,            
                'avatar' => $bio->avatar,
                'location' => $bio->location,
                'skills' => $skills
            ]; 
            return $bioData;     
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong');
        }
        
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
