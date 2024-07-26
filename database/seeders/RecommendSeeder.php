<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecommendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recommends = [
            ['tool_id' => '0', 'material_id' => '15', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '27', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '35', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '17', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '22', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '47', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '43', 'material_id' => '0', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '36', 'material_id' => '0', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '28', 'material_id' => '0', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],
            ['tool_id' => '50', 'material_id' => '0', 'practice' => 'Analisis Kimia Kuantitatif', 'relation' => 'kimia'],

            ['tool_id' => '0', 'material_id' => '14', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '48', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '13', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '11', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '30', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '54', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '34', 'material_id' => '0', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '56', 'material_id' => '0', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '18', 'material_id' => '0', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],
            ['tool_id' => '10', 'material_id' => '0', 'practice' => 'Kimia Organik Sintesis', 'relation' => 'kimia'],

            ['tool_id' => '0', 'material_id' => '31', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '32', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '19', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '21', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '46', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '0', 'material_id' => '60', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '12', 'material_id' => '0', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '33', 'material_id' => '0', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '45', 'material_id' => '0', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],
            ['tool_id' => '58', 'material_id' => '0', 'practice' => 'Spektroskopi', 'relation' => 'kimia'],

            ['tool_id' => '0', 'material_id' => '11', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => '29', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => '33', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => '44', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => '6', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => '1', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => '19', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '33', 'material_id' => '0', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '44', 'material_id' => '0', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '55', 'material_id' => '0', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],
            ['tool_id' => '11', 'material_id' => '0', 'practice' => 'Mikrobiologi', 'relation' => 'biologi'],

            ['tool_id' => '0', 'material_id' => '0', 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Genetika Molekuler', 'relation' => 'biologi'],

            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Biologi Sel', 'relation' => 'biologi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Biologi Sel', 'relation' => 'biologi'],

            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Farmakologi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Farmakologi', 'relation' => 'farmasi'],

            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Formulasi dan Teknologi Farmasi', 'relation' => 'farmasi'],

            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => '0', 'material_id' => rand(1, 60), 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi'],
            ['tool_id' => rand(1, 60), 'material_id' => '0', 'practice' => 'Analisis Farmasi', 'relation' => 'farmasi']
        ];

        // Inserting into database
        DB::table('recommend')->insert($recommends);
    }
}
