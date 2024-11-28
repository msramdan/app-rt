<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wargas')->insert([
            [
                'nama' => 'Ahmad Fauzi',
                'no_kk' => '1234567890123456',
                'nik' => '123',
                'agama' => 'Islam',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => Carbon::create('1990', '01', '01')->format('Y-m-d'),
                'status_kawin' => 'Kawin',
                'golongan_darah' => 'A',
                'pekerjaan' => 'PNS',
                'alamat_lengkap' => 'Jl. Merdeka No. 1, Jakarta',
                'kartu_keluarga' => '1234567890',
                'is_verify' => 'Yes',
                'password' => bcrypt('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Mariam',
                'no_kk' => '2345678901234567',
                'nik' => '2345678901234567',
                'agama' => 'Kristen Protestan',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => Carbon::create('1992', '02', '14')->format('Y-m-d'),
                'status_kawin' => 'Belum Kawin',
                'golongan_darah' => 'B',
                'pekerjaan' => 'Guru',
                'alamat_lengkap' => 'Jl. Suka Damai No. 7, Bandung',
                'kartu_keluarga' => '2345678901',
                'is_verify' => 'No',
                'password' => bcrypt('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Joko Santoso',
                'no_kk' => '3456789012345678',
                'nik' => '3456789012345678',
                'agama' => 'Hindu',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Bali',
                'tanggal_lahir' => Carbon::create('1985', '07', '20')->format('Y-m-d'),
                'status_kawin' => 'Cerai Hidup',
                'golongan_darah' => 'O',
                'pekerjaan' => 'Pengusaha',
                'alamat_lengkap' => 'Jl. Pantai No. 5, Bali',
                'kartu_keluarga' => '3456789012',
                'is_verify' => 'Yes',
                'password' => bcrypt('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Indah Permata',
                'no_kk' => '4567890123456789',
                'nik' => '4567890123456789',
                'agama' => 'Buddha',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => Carbon::create('1995', '05', '25')->format('Y-m-d'),
                'status_kawin' => 'Cerai Mati',
                'golongan_darah' => 'AB',
                'pekerjaan' => 'Dokter',
                'alamat_lengkap' => 'Jl. Surya No. 10, Surabaya',
                'kartu_keluarga' => '4567890123',
                'is_verify' => 'No',
                'password' => bcrypt('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
