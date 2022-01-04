<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> 'Rafael Juliano Ferreira',
            'email'=> 'rafael.j.ferreira@hotmail.com',
            'phone'=> '(41) 98474-6468',  
            'linkedin'=> 'https://www.linkedin.com/in/rafael-juliano-ferreira-991084169/',
            'github'=> 'https://api.github.com/users/RafaelJuliano'        
        ];
    }
}
