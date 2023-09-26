<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 100000; $i++) {

        //     // insert data ke table pegawai menggunakan Faker
        //     DB::table('tb_kegiatans')->insert([
        //         'user_id' => $faker->numberBetween(1, 1),
        //         'm_unitkerja_id' => $faker->numberBetween(1, 4),
        //         'm_jabatan_id' => $faker->numberBetween(1, 4),
        //         'pk_bk' => $faker->numberBetween(1, 5),
        //         'jumlah_kegiatan' => $faker->numberBetween(1, 5),
        //         'jam_efektif' => $faker->numberBetween(1, 5),
        //     ]);
        // }
    }
}
