<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'room_name' => 'Lab A',
                'status' => 'Tersedia',
                'total_tools' => 15,
                'total_materials' => 30,
                'major_name' => 'Farmasi',
                'faculty_name' => 'FMIPA'
            ],
            [
                'room_name' => 'Lab B',
                'status' => 'In Use',
                'total_tools' => 10,
                'total_materials' => 20,
                'major_name' => 'Elektro',
                'faculty_name' => 'FT'
            ],
            [
                'room_name' => 'Lab C',
                'status' => 'Under Maintenance',
                'total_tools' => 8,
                'total_materials' => 15,
                'major_name' => 'Kedokteran Gigi',
                'faculty_name' => 'FK'
            ],
            [
                'room_name' => 'Lab D',
                'status' => 'Available',
                'total_tools' => 12,
                'total_materials' => 25,
                'major_name' => 'Agribisnis',
                'faculty_name' => 'FP'
            ],
            [
                'room_name' => 'Lab E',
                'status' => 'In Use',
                'total_tools' => 20,
                'total_materials' => 40,
                'major_name' => 'Kedokteran Hewan',
                'faculty_name' => 'FKH'
            ]
        ]);
    }
}
