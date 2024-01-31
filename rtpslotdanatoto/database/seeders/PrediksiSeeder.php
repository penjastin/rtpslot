<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PrediksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');

    	// for($i = 1; $i <= 50; $i++){

    	//       // insert data ke table pegawai menggunakan Faker
    	// 	DB::table('prediksi_togel')->insert([
    	// 		'site' => $faker->numberBetween(2,6),
    	// 		'jenis_togel_id' => $faker->numberBetween(1,5),
    	// 		'kategori_id' => $faker->numberBetween(1,2),
    	// 		'tanggal' => $faker->date,
    	// 		'bbfs' => $faker->numberBetween(1000000,9000000),
    	// 		'angka_main' => $faker->numberBetween(10000,90000),
    	// 		'd4' => $faker->randomNumber(4).'   '.$faker->randomNumber(4).'   '.$faker->randomNumber(4).'   '.$faker->randomNumber(4),
    	// 		'd3' => $faker->randomNumber(4).'   '.$faker->randomNumber(4).'   '.$faker->randomNumber(4).'   '.$faker->randomNumber(4),
    	// 		'bb_2d' => $faker->randomNumber(2).'   '.$faker->randomNumber(2).'   '.$faker->randomNumber(2).'   '.$faker->randomNumber(2),
    	// 		'cadangan_2d' => $faker->randomNumber(2).'   '.$faker->randomNumber(2).'   '.$faker->randomNumber(2).'   '.$faker->randomNumber(2),
    	// 		'colok_bebas_2d' => $faker->randomNumber(2).' / '.$faker->randomNumber(2).' / '.$faker->randomNumber(2),
    	// 		'colok_bebas' => $faker->randomNumber(1).' / '.$faker->randomNumber(1),
    	// 		'shio' => $faker->randomElement(['Macan', 'Singa', 'Kerbau', 'Ular', 'Kuda', 'Kelinci' , 'Naga']).' / '.$faker->randomElement(['Macan', 'Singa', 'Kerbau', 'Ular', 'Kuda', 'Kelinci' , 'Naga']).' / '.$faker->randomElement(['Macan', 'Singa', 'Kerbau', 'Ular', 'Kuda', 'Kelinci' , 'Naga'])
    	// 	]);

    	// }

        // $faker = Faker::create('id_ID');

    	// for($i = 1; $i <= 25; $i++){

    	//     // insert data ke table pegawai menggunakan Faker
    	// 	DB::table('jenis_togel')->insert([
    	// 		'nama_togel' => $faker->randomElement(['Macan', 'Singa', 'Kerbau', 'Ular', 'Kuda', 'Kelinci' , 'Naga']),
    	// 		'status' =>  '1',
    	// 		'created_at' => $faker->timezone,
    	// 		'updated_at' => $faker->timezone,
    	// 	]);

    	// }

    }
}