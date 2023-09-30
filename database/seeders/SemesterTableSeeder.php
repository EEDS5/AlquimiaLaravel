<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semester=[
            [
                'dateStart' => '2021-01-01',
                'dateEnd' => '2021-06-30',
                'frozen' => 0, 
            ],
            
            [
                'dateStart' => '2021-01-01',
                'dateEnd' => '2021-06-30',
                'frozen' => 1, 
            ],
            
            ];

            foreach ($semester as $semesters) {
                Semester::create($semesters);
            }

        
        
    }
}
