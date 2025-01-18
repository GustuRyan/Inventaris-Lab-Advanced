<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $material0 = ['id' => 0, 'material_name' => '', 'character' => '', 'condition' => '', 'in_date' => ''];

        $materials = [
            ['material_name' => 'Air', 'character' => 'Cair', 'condition' => 'Cairan transparan yang tidak berbau dan tidak berasa, digunakan sebagai pelarut umum.', 'in_date' => now()],
            ['material_name' => 'Etanol', 'character' => 'Cair', 'condition' => 'Cairan mudah menguap, mudah terbakar, digunakan sebagai pelarut dan dalam disinfektan.', 'in_date' => now()],
            ['material_name' => 'Asam Sulfat', 'character' => 'Cair', 'condition' => 'Cairan korosif yang kuat, digunakan dalam pembuatan bahan kimia dan baterai.', 'in_date' => now()],
            ['material_name' => 'Natrium Klorida', 'character' => 'Padat', 'condition' => 'Kristal putih yang dikenal sebagai garam dapur, digunakan dalam banyak aplikasi laboratorium.', 'in_date' => now()],
            ['material_name' => 'Zat Besi', 'character' => 'Padat', 'condition' => 'Logam yang keras dan magnetik, digunakan dalam berbagai eksperimen dan industri.', 'in_date' => now()],
            ['material_name' => 'Karbon Dioksida', 'character' => 'Gas', 'condition' => 'Gas tidak berwarna, tidak berbau yang digunakan dalam pemadaman kebakaran dan karbonasi minuman.', 'in_date' => now()],
            ['material_name' => 'Oksigen', 'character' => 'Gas', 'condition' => 'Gas tidak berwarna dan tidak berbau yang diperlukan untuk respirasi makhluk hidup.', 'in_date' => now()],
            ['material_name' => 'Asam Klorida', 'character' => 'Cair', 'condition' => 'Cairan berbau tajam dan sangat korosif, digunakan dalam pengolahan logam dan kimia analitik.', 'in_date' => now()],
            ['material_name' => 'Amoniak', 'character' => 'Gas', 'condition' => 'Gas berbau tajam, digunakan dalam pembuatan pupuk dan sebagai pembersih.', 'in_date' => now()],
            ['material_name' => 'Kalium Permanganat', 'character' => 'Padat', 'condition' => 'Kristal ungu, digunakan sebagai oksidator kuat dalam kimia analitik.', 'in_date' => now()],
            ['material_name' => 'Glukosa', 'character' => 'Padat', 'condition' => 'Zat padat berwarna putih, gula sederhana yang penting dalam metabolisme biologis.', 'in_date' => now()],
            ['material_name' => 'Asam Asetat', 'character' => 'Cair', 'condition' => 'Cairan berbau tajam, komponen utama cuka, digunakan dalam banyak reaksi kimia.', 'in_date' => now()],
            ['material_name' => 'Natrium Hidroksida', 'character' => 'Padat', 'condition' => 'Kristal putih higroskopis, sangat basa, digunakan dalam pembuatan sabun dan pembersih.', 'in_date' => now()],
            ['material_name' => 'Aseton', 'character' => 'Cair', 'condition' => 'Cairan mudah menguap, mudah terbakar, digunakan sebagai pelarut dalam laboratorium.', 'in_date' => now()],
            ['material_name' => 'Fenol', 'character' => 'Cair', 'condition' => 'Cairan atau padatan yang berbau khas, digunakan dalam pembuatan resin dan plastik.', 'in_date' => now()],
            ['material_name' => 'Belerang', 'character' => 'Padat', 'condition' => 'Zat padat kuning, digunakan dalam pembuatan asam sulfat dan vulkanisasi karet.', 'in_date' => now()],
            ['material_name' => 'Asetilen', 'character' => 'Gas', 'condition' => 'Gas mudah terbakar, digunakan dalam pengelasan dan pemotongan logam.', 'in_date' => now()],
            ['material_name' => 'MgCl2 (Magnesium Klorida)', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam produksi magnesium metal.', 'in_date' => now()],
            ['material_name' => 'Karbon', 'character' => 'Tergantung', 'condition' => 'Bentuk padat sebagai grafit atau berlian, bentuk gas sebagai CO2.', 'in_date' => now()],
            ['material_name' => 'Metanol', 'character' => 'Cair', 'condition' => 'Cairan mudah menguap, sangat beracun, digunakan sebagai pelarut dan bahan bakar.', 'in_date' => now()],
            ['material_name' => 'Asam Nitrat', 'character' => 'Cair', 'condition' => 'Cairan berwarna kuning ke coklat, sangat korosif, digunakan dalam pembuatan pupuk dan bahan peledak.', 'in_date' => now()],
            ['material_name' => 'Sukrosa', 'character' => 'Padat', 'condition' => 'Zat padat kristalin putih, dikenal sebagai gula meja, digunakan dalam banyak aplikasi laboratorium.', 'in_date' => now()],
            ['material_name' => 'Formaldehida', 'character' => 'Cair/Gas', 'condition' => 'Gas berbau tajam yang larut dalam air, digunakan sebagai pengawet dan desinfektan.', 'in_date' => now()],
            ['material_name' => 'Argon', 'character' => 'Gas', 'condition' => 'Gas mulia yang tidak berwarna dan tidak berbau, digunakan dalam pengelasan dan lampu pijar.', 'in_date' => now()],
            ['material_name' => 'Barium Klorida', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam analisis kimia dan pembuatan kembang api.', 'in_date' => now()],
            ['material_name' => 'Asam Borat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam antiseptik dan bahan baku pembuatan gelas.', 'in_date' => now()],
            ['material_name' => 'Magnesium Sulfat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan sebagai pencahar dan dalam produksi tekstil.', 'in_date' => now()],
            ['material_name' => 'Amonium Nitrat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembuatan pupuk dan bahan peledak.', 'in_date' => now()],
            ['material_name' => 'Butanol', 'character' => 'Cair', 'condition' => 'Cairan mudah terbakar, digunakan sebagai pelarut dan bahan bakar.', 'in_date' => now()],
            ['material_name' => 'CaCl2 (Kalsium Klorida)', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan sebagai pengering dan dalam pembuatan es.', 'in_date' => now()],
            ['material_name' => 'Nitrogen', 'character' => 'Gas', 'condition' => 'Gas tidak berwarna, tidak berbau, digunakan sebagai atmosfer inert dalam reaksi kimia.', 'in_date' => now()],
            ['material_name' => 'Asam Oksalat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembersihan logam dan sebagai zat pengurang.', 'in_date' => now()],
            ['material_name' => 'NaNO3 (Natrium Nitrat)', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembuatan pupuk dan bahan peledak.', 'in_date' => now()],
            ['material_name' => 'Propana', 'character' => 'Gas', 'condition' => 'Gas mudah terbakar, digunakan sebagai bahan bakar dan dalam pengelasan.', 'in_date' => now()],
            ['material_name' => 'Kloroform', 'character' => 'Cair', 'condition' => 'Cairan tidak berwarna, digunakan sebagai pelarut dan dalam sintesis organik.', 'in_date' => now()],
            ['material_name' => 'Silika', 'character' => 'Padat', 'condition' => 'Zat padat berwarna putih, digunakan dalam pembuatan gelas dan sebagai bahan pengisi.', 'in_date' => now()],
            ['material_name' => 'Karbon Monoksida', 'character' => 'Gas', 'condition' => 'Gas tidak berwarna dan tidak berbau, sangat beracun, dihasilkan dari pembakaran tidak sempurna.', 'in_date' => now()],
            ['material_name' => 'Asam Fosfat', 'character' => 'Cair', 'condition' => 'Cairan berwarna transparan, digunakan dalam pembuatan pupuk dan sebagai pengatur pH.', 'in_date' => now()],
            ['material_name' => 'Asam Benzoat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan sebagai pengawet makanan dan dalam sintesis kimia.', 'in_date' => now()],
            ['material_name' => 'Kalium Hidroksida', 'character' => 'Padat', 'condition' => 'Kristal putih, sangat basa, digunakan dalam pembuatan sabun dan elektrolit.', 'in_date' => now()],
            ['material_name' => 'Metil Orange', 'character' => 'Padat', 'condition' => 'Zat padat berwarna oranye, digunakan sebagai indikator pH.', 'in_date' => now()],
            ['material_name' => 'Asam Sitrat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan sebagai pengawet makanan dan dalam reaksi kimia.', 'in_date' => now()],
            ['material_name' => 'Natrium Karbonat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembuatan kaca dan sebagai pembersih.', 'in_date' => now()],
            ['material_name' => 'Kalium Dikromat', 'character' => 'Padat', 'condition' => 'Kristal oranye, digunakan sebagai oksidator dalam reaksi kimia.', 'in_date' => now()],
            ['material_name' => 'Natrium Tiosulfat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam fotografi dan sebagai antidot sianida.', 'in_date' => now()],
            ['material_name' => 'Asam Perklorat', 'character' => 'Cair', 'condition' => 'Cairan sangat korosif, digunakan dalam pembuatan bahan peledak.', 'in_date' => now()],
            ['material_name' => 'Kalium Klorat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembuatan korek api dan bahan peledak.', 'in_date' => now()],
            ['material_name' => 'Lithium Klorida', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam sintesis organik dan sebagai pengering.', 'in_date' => now()],
            ['material_name' => 'Asam Formiat', 'character' => 'Cair', 'condition' => 'Cairan berbau tajam, digunakan dalam penyamakan kulit dan sebagai pengawet.', 'in_date' => now()],
            ['material_name' => 'Perak Nitrat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam fotografi dan sebagai antiseptik.', 'in_date' => now()],
            ['material_name' => 'Natrium Benzoat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan sebagai pengawet makanan dan dalam sintesis kimia.', 'in_date' => now()],
            ['material_name' => 'Aluminium Oksida', 'character' => 'Padat', 'condition' => 'Zat padat putih, digunakan dalam pembuatan keramik dan sebagai abrasif.', 'in_date' => now()],
            ['material_name' => 'Kalium Karbonat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembuatan sabun dan kaca.', 'in_date' => now()],
            ['material_name' => 'Ammonium Sulfat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembuatan pupuk dan sebagai agen pengendap.', 'in_date' => now()],
            ['material_name' => 'Isopropanol', 'character' => 'Cair', 'condition' => 'Cairan mudah menguap, digunakan sebagai pelarut dan desinfektan.', 'in_date' => now()],
            ['material_name' => 'Heptana', 'character' => 'Cair', 'condition' => 'Cairan tidak berwarna, digunakan sebagai pelarut dalam laboratorium.', 'in_date' => now()],
            ['material_name' => 'Asam Laktat', 'character' => 'Cair', 'condition' => 'Cairan berwarna kuning, digunakan dalam industri makanan dan farmasi.', 'in_date' => now()],
            ['material_name' => 'Klorin', 'character' => 'Gas', 'condition' => 'Gas berwarna hijau kekuningan, digunakan sebagai disinfektan dan dalam pemutihan.', 'in_date' => now()],
            ['material_name' => 'Zinc Sulfat', 'character' => 'Padat', 'condition' => 'Kristal putih, digunakan dalam pembuatan rayon dan sebagai suplemen diet.', 'in_date' => now()],
            ['material_name' => 'Benzena', 'character' => 'Cair', 'condition' => 'Cairan tidak berwarna, sangat mudah terbakar, digunakan dalam sintesis kimia.', 'in_date' => now()],
        ];

        // Inserting into database
        DB::table('materials')->insert($material0);
        DB::table('materials')->insert($materials);
    }
}
