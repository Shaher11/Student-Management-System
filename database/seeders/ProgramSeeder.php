<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Program::factory(10)->create();
        
        Program::create(['name' => 'Aerospace', 'description'=> 'research, analyze, design, synthesize, develop and test aircraft, spacecraft and weapons.' ]);
        Program::create(['name' => 'Agricultural', 'description'=> 'Agricultural engineering degrees prepare students to work professionally in the many fields of agriculture.' ]);
        Program::create(['name' => 'Audio', 'description'=> 'Audio engineering is an intricate blend of science and creativity.' ]);
        Program::create(['name' => 'Automotive', 'description'=> 'Automotive engineering is a branch of mechanical engineering that concerns the design, development and manufacture of cars, trucks, motorcycles and other motor vehicles.' ]);
        Program::create(['name' => 'Biomedical', 'description'=> 'A relatively new discipline, biomedical engineering involves research and development that combine medical and biological sciences for the advancement of all healthcare disciplines.' ]);
        Program::create(['name' => 'Chemical', 'description'=> 'Chemical engineers are not only the lab coat wearing scientists holding beakers and mixing formulas in laboratories.' ]);
        Program::create(['name' => 'Civil', 'description'=> 'Civil engineers design, construct, maintain, and operate infrastructures, while simultaneously safeguarding public and environmental health and upgrading neglected structures and systems. ' ]);
        Program::create(['name' => 'Computer', 'description'=> 'Computer Engineering differs from Software Engineering and Computer Science in that it focuses on the actual hardware that’s responsible for performing the work.' ]);
        Program::create(['name' => 'Electrical', 'description'=> 'Electrical engineers study electronics, electromagnetism, and the application of electricity.' ]);
        Program::create(['name' => 'Petroleum', 'description'=> 'Petroleum engineering deals with the production of hydrocarbons—the products of crude oil and natural gas.' ]);
        
    }
}