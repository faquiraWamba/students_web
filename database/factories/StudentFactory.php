<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $g=$this->faker->boolean()?'M':'F';
        
        $p=$this->faker->file(database_path('seeders\students\pictures'),
        storage_path('app\public\students\pictures'));
        $p=explode(storage_path('app\public'),$p)[1];
        $p=str_replace('\\','/',$p);
        $p=substr($p,1);
        return [
            //
            'name'=>$this->faker->name($g),
            'last_name'=>$this->faker->firstName($g),
            'gender'=>$g,
            'age'=>$this->faker->numberBetween(16,30),
            'is_asi'=>$this->faker->boolean(75),
            'picture'=>$p];
    }
}
