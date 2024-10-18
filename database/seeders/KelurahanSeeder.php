<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            "Gunung Bahagia",
            "Sepinggan",
            "Sepinggan Raya",
            "Sepinggan Baru",
            "Manggar",
            "Manggar Baru",
            "Klandasan Ilir",
            "Klandasan Ulu",
            "Damai",
            "Damai Bahagia",
            "Sumber Rejo",
            "Karang Jati",
            "Karang Rejo",
            "Baru Ilir",
            "Baru Tengah",
            "Baru Ulu",
            "Gunung Sari Ilir",
            "Gunung Sari Ulu",
            "Margo Mulyo",
            "Muara Rapak",
            "Batu Ampar",
            "Karang Joang",
            "Graha Indah",
            "Batu-Batu",
            "Telagasari",
            "Prapatan",
            "Gunung Samarinda",
            "Gunung Samarinda Baru",
            "Teritip",
            "Lamaru"
        ];

        foreach ($data as $key => $value) {
            Kelurahan::create([
                "nama" => $value
            ]);
        }
    }
}
