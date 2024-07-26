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
            if ($i <= 90) {
                $roomId = rand(1, 5);
                $materialId = rand(1, 60); // Random material_id including 0
                $toolId = 0; // Random tool_id including 0
                $amount = rand(100, 150);
            } else {
                $roomId = rand(1, 5);
                $materialId = 0; // Random material_id including 0
                $toolId = rand(1, 60); // Random tool_id including 0
                $amount = rand(10, 30);
            }
            
            $roomDetails[] = [
                'room_id' => $roomId,
                'material_id' => $materialId,
                'tool_id' => $toolId,
                'amount' => $amount,
            ];
        }

        // Insert data into the database
        DB::table('room_details')->insert($roomDetails);
    }
}
