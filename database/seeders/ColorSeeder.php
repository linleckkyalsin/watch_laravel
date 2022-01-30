<?php

namespace Database\Seeders;

use App\Models\Watchcolor;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Watchcolor::create([
            'name'=>'blue'
        ]);
        Watchcolor::create([
            'name'=>'white'
        ]);
        Watchcolor::create([
            'name'=>'black'
        ]);
        Watchcolor::create([
            'name'=>'green'
        ]);
        Watchcolor::create([
            'name'=>'red'
        ]);
    }
}
