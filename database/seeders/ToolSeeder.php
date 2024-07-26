<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = [
            ['tool_name' => 'Beaker', 'merk' => 'Pyrex', 'condition' => 'Baik', 'stocks' => 10, 'in_date' => now()],
            ['tool_name' => 'Erlenmeyer Flask', 'merk' => 'Duran', 'condition' => 'Baik', 'stocks' => 5, 'in_date' => now()],
            ['tool_name' => 'Buret', 'merk' => 'Sigma-Aldrich', 'condition' => 'Baik', 'stocks' => 3, 'in_date' => now()],
            ['tool_name' => 'Pipet Tetes', 'merk' => 'Eppendorf', 'condition' => 'Baik', 'stocks' => 8, 'in_date' => now()],
            ['tool_name' => 'Tabung Reaksi', 'merk' => 'Kimax', 'condition' => 'Baik', 'stocks' => 12, 'in_date' => now()],
            ['tool_name' => 'Termometer', 'merk' => 'IKA', 'condition' => 'Baik', 'stocks' => 2, 'in_date' => now()],
            ['tool_name' => 'Timbangan Digital', 'merk' => 'Ohaus', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Spektrofotometer', 'merk' => 'Shimadzu', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Sentrifuga', 'merk' => 'Hettich', 'condition' => 'Baik', 'stocks' => 3, 'in_date' => now()],
            ['tool_name' => 'Hot Plate', 'merk' => 'Corning', 'condition' => 'Baik', 'stocks' => 4, 'in_date' => now()],
            ['tool_name' => 'Magnetic Stirrer', 'merk' => 'Ika', 'condition' => 'Baik', 'stocks' => 6, 'in_date' => now()],
            ['tool_name' => 'Desikator', 'merk' => 'Brand', 'condition' => 'Baik', 'stocks' => 2, 'in_date' => now()],
            ['tool_name' => 'pH Meter', 'merk' => 'Mettler Toledo', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Balances Analytical', 'merk' => 'Sartorius', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Water Bath', 'merk' => 'Memmert', 'condition' => 'Baik', 'stocks' => 2, 'in_date' => now()],
            ['tool_name' => 'Microplate Reader', 'merk' => 'BioTek', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Autoclave', 'merk' => 'Hirayama', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Incubator', 'merk' => 'Binder', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Laminar Flow Hood', 'merk' => 'Nuaire', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Fume Hood', 'merk' => 'Laboratory Systems', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Microscope', 'merk' => 'Olympus', 'condition' => 'Baik', 'stocks' => 5, 'in_date' => now()],
            ['tool_name' => 'Pipet Mikropipet', 'merk' => 'Gilson', 'condition' => 'Baik', 'stocks' => 4, 'in_date' => now()],
            ['tool_name' => 'Spectrophotometer UV-Vis', 'merk' => 'Agilent', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Refraktometer', 'merk' => 'Atago', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Bunsen Burner', 'merk' => 'Fisher Scientific', 'condition' => 'Baik', 'stocks' => 3, 'in_date' => now()],
            ['tool_name' => 'Orbital Shaker', 'merk' => 'New Brunswick', 'condition' => 'Baik', 'stocks' => 2, 'in_date' => now()],
            ['tool_name' => 'Gas Chromatograph', 'merk' => 'Agilent', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Fluorescence Microscope', 'merk' => 'Leica', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Electrophoresis Apparatus', 'merk' => 'Bio-Rad', 'condition' => 'Baik', 'stocks' => 2, 'in_date' => now()],
            ['tool_name' => 'Vortex Mixer', 'merk' => 'Scientific Industries', 'condition' => 'Baik', 'stocks' => 3, 'in_date' => now()],
            ['tool_name' => 'Sonicator', 'merk' => 'Qsonica', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Reactor', 'merk' => 'Parr', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Freeze Dryer', 'merk' => 'Labconco', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Colorimeter', 'merk' => 'Hach', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Distillation Apparatus', 'merk' => 'Quickfit', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Rotary Evaporator', 'merk' => 'Buchi', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Chromatography Column', 'merk' => 'GE Healthcare', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Thermocycler', 'merk' => 'Eppendorf', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Magnetic Hotplate Stirrer', 'merk' => 'Ika', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Tensiometer', 'merk' => 'Kruss', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Conductivity Meter', 'merk' => 'Horiba', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Titrator', 'merk' => 'Metrohm', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Particle Size Analyzer', 'merk' => 'Malvern', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Moisture Analyzer', 'merk' => 'Sartorius', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Viscometer', 'merk' => 'Brookfield', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'HPLC (High Performance Liquid Chromatography)', 'merk' => 'Waters', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'FTIR Spectrometer', 'merk' => 'Bruker', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Ultracentrifuge', 'merk' => 'Beckman Coulter', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Gel Documentation System', 'merk' => 'Bio-Rad', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Thermogravimetric Analyzer (TGA)', 'merk' => 'PerkinElmer', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Gas Analyzer', 'merk' => 'ABB', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'ICP-OES (Inductively Coupled Plasma Optical Emission Spectroscopy)', 'merk' => 'Thermo Fisher', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'TOC Analyzer', 'merk' => 'Shimadzu', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'AAS (Atomic Absorption Spectroscopy)', 'merk' => 'PerkinElmer', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Densitometer', 'merk' => 'Bio-Rad', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Infrared Thermometer', 'merk' => 'Fluke', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Turbidimeter', 'merk' => 'Hach', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Flame Photometer', 'merk' => 'Jenway', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Ultraviolet Lamp', 'merk' => 'UVP', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
            ['tool_name' => 'Liquid Handling Robot', 'merk' => 'Hamilton', 'condition' => 'Baik', 'stocks' => 1, 'in_date' => now()],
        ];

        // Insert data into the database
        DB::table('tools')->insert($equipments);
    }
}
