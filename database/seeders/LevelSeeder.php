<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level1 = Level::create([
            'name' => 'Level 1',
            'description' => 'This is level 1 description'
        ]);
        $level2 = Level::create([
            'name' => 'Level 2',
            'description' => 'This is level 2 description'
        ]);
        $level3 = Level::create([
            'name' => 'Level 3',
            'description' => 'This is level 3 description'
        ]);
        $level3 = Level::create([
            'name' => 'Level 4',
            'description' => 'This is level 4 description'
        ]);
       
    }
}