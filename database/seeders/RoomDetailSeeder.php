<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomDetails = [];

        for ($i = 1; $i <= 150; $i++) {
            $roomId = rand(1, 5);
            if ($i <= 90) {
                $materialId = rand(1, 60);
                $toolId = 0;
                $total_amount = rand(100, 150);
            } else {
                $materialId = 0; 
                $toolId = rand(1, 60);
                $total_amount = rand(10, 30);
            }

            $roomDetails[] = [
                'room_id' => $roomId,
                'material_id' => $materialId,
                'tool_id' => $toolId,
                'total_stocks' => $total_amount,
                'current_stocks' => $total_amount,
            ];
        }

        // Insert data ke database
        DB::table('room_details')->insert($roomDetails);
    }

}
