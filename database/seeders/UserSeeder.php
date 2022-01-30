<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Color::create([
            'name'=>'blue'
        ]);
        Color::create([
            'name'=>'white'
        ]);
        Color::create([
            'name'=>'black'
        ]);
        Color::create([
            'name'=>'green'
        ]);
        Color::create([
            'name'=>'red'
        ]);
    }
}
