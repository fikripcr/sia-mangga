<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Inisialisasi Faker dengan lokal Indonesia (id_ID)
        // Ini akan menghasilkan nama dan nomor telepon yang formatnya Indonesia
        $faker = Faker::create('de');

        // Hapus data lama jika perlu, untuk menghindari error unique email
        //DB::table('pelanggan')->truncate();

        // Buat array untuk menampung data
        $pelanggan = [];

        // Generate 50 data dummy
        for ($i = 0; $i < 50; $i++) {
            $pelanggan[] = [
                // pelanggan_id tidak diisi karena AUTO_INCREMENT

                'first_name' => $faker->firstName,                                 // VARCHAR(100)
                'last_name'  => $faker->lastName,                                  // VARCHAR(100)
                'birthday'   => $faker->date('Y-m-d'),                             // DATE
                'gender'     => $faker->randomElement(['Laki-laki', 'Perempuan']), // TEXT
                'email'      => $faker->unique()->safeEmail,                       // VARCHAR(100) & UNIQUE
                'phone'      => $faker->phoneNumber,                               // VARCHAR(20)

                // created_at dan updated_at diisi dengan waktu sekarang
                // 'created_at' => Carbon::now(), // TIMESTAMP
                // 'updated_at' => Carbon::now(), // TIMESTAMP
            ];
        }

        // Masukkan semua data sekaligus ke database
        DB::table('pelanggan')->insert($pelanggan);

    }
}
