<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'url',
        'type',
        'skilss',
    ];

    public function returnProjects()
    {
        $projects = $this->orderBy('created_at', 'asc')->get();
        $projects = $this->explodeAllSkills($projects);
        return $projects;
    }

    private function explodeAllSkills($projects)
    {
        foreach ($projects as $project) {
            $project->skilss = explode(';', $project->skilss);
        }
        return $projects;
    }


    use HasFactory;
}
