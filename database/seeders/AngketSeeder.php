<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AngketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data untuk kode_angkets
        // $kodeAngkets = [
        //     ['kode_angket' => 'KM', 'nama' => 'KNOWLEDGE OF METACOGNITIVE'],
        //     ['kode_angket' => 'RM', 'nama' => 'REGULATION OF METACOGNITIVE'],
        // ];

        // // Memasukkan data ke tabel kode_angkets
        // foreach ($kodeAngkets as $kodeAngket) {
        //     DB::table('kode_angkets')->insert($kodeAngket);
        // }

        // Data untuk sub_angkets
        $subAngkets = [
            ['kode_angket' => 'KM', 'kode_subangket' => 'DK', 'nama' => 'DECLARATIVE KNOWLEDGE'],
            ['kode_angket' => 'KM', 'kode_subangket' => 'PK', 'nama' => 'PROSEDURAL KNOWLEDGE'],
            ['kode_angket' => 'KM', 'kode_subangket' => 'CK', 'nama' => 'CONDITIONAL KNOWLEDGE'],
            ['kode_angket' => 'RM', 'kode_subangket' => 'P', 'nama' => 'PLANNING'],
            ['kode_angket' => 'RM', 'kode_subangket' => 'IM', 'nama' => 'INFORMATION MANAGEMENT'],
            ['kode_angket' => 'RM', 'kode_subangket' => 'M', 'nama' => 'MONITORING'],
            ['kode_angket' => 'RM', 'kode_subangket' => 'D', 'nama' => 'DEBUGGING'],
            ['kode_angket' => 'RM', 'kode_subangket' => 'E', 'nama' => 'EVALUATION'],
        ];

        // Memasukkan data ke tabel sub_angkets
        foreach ($subAngkets as $subAngket) {
            DB::table('sub_angkets')->insert($subAngket);
        }
    }
}
