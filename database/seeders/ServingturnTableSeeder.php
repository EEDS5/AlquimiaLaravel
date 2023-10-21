<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ServingTurnFactory;
use App\Models\Semester;
use App\Models\ServingTurn;

class ServingTurnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $serving_turn=[
        //     [
        //         'startTime' => '2023-09-30 07:00:00',
        //         'endTime' => '2023-09-30 09:00:00',
        //         'semester_id' => 1,
        //         'descript' => 'Desayuno',
        //         'maxSlots' => 100,
        //         'frozen' => false,
        //     ],
        //     [
        //         'startTime' => '2023-09-30 07:00:00',
        //         'endTime' => '2023-09-30 09:00:00',
        //         'semester_id' => 1,
        //         'descript' => 'Almuerzo',
        //         'maxSlots' => 100,
        //         'frozen' => false,
        //     ],
        //     [
        //         'startTime' => '2023-09-30 07:00:00',
        //         'endTime' => '2023-09-30 09:00:00',
        //         'semester_id' => 1,
        //         'descript' => 'Cena',
        //         'maxSlots' => 100,
        //         'frozen' => false,
        //     ],
         

        // ];

        // foreach ($serving_turn as $servingturn) {
        //     Servingturn::create($servingturn);
        // }

        $servingTurnFactory = ServingTurnFactory::factoryForModel(ServingTurn::class);
        $servingTurnFactory->count(10)->create(); 
    }
}

