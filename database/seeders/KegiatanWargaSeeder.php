<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KegiatanWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatan_wargas')->insert([
            [
                'tanggal_kegiatan' => Carbon::now()->subDays(5)->toDateString(),
                'judul_kegiatan' => 'Rapat Lingkungan',
                'keterangan_kegiatan' => 'Rapat untuk membahas program kebersihan lingkungan di RT 01.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tanggal_kegiatan' => Carbon::now()->subDays(3)->toDateString(),
                'judul_kegiatan' => 'Pembersihan Saluran Air',
                'keterangan_kegiatan' => 'Kegiatan pembersihan saluran air di sepanjang jalan utama RT 03.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tanggal_kegiatan' => Carbon::now()->subDays(2)->toDateString(),
                'judul_kegiatan' => 'Bakti Sosial',
                'keterangan_kegiatan' => 'Bakti sosial untuk membantu warga yang kurang mampu di lingkungan RT 04.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tanggal_kegiatan' => Carbon::now()->subDay()->toDateString(),
                'judul_kegiatan' => 'Penyuluhan Kesehatan',
                'keterangan_kegiatan' => 'Penyuluhan tentang pentingnya kesehatan dan kebersihan lingkungan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tanggal_kegiatan' => Carbon::now()->toDateString(),
                'judul_kegiatan' => 'Pengumpulan Sampah',
                'keterangan_kegiatan' => 'Kegiatan pengumpulan sampah dan pemilahan sampah di RT 05.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
