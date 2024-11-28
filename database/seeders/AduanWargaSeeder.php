<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AduanWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aduan_wargas')->insert([
            [
                'nama_pengirim' => 'John Doe',
                'tanggal' => Carbon::now()->subDays(5)->toDateString(),
                'judul' => 'Kondisi Jalan Rusak',
                'keterangan' => 'Jalan di dekat RT 04 rusak parah dan sangat membahayakan pengendara.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_pengirim' => 'Jane Smith',
                'tanggal' => Carbon::now()->subDays(3)->toDateString(),
                'judul' => 'Penerangan Jalan Tidak Berfungsi',
                'keterangan' => 'Lampu penerangan di Jalan Merdeka mati, membuat daerah tersebut gelap saat malam hari.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_pengirim' => 'Ali Husein',
                'tanggal' => Carbon::now()->subDays(2)->toDateString(),
                'judul' => 'Sampah Menumpuk',
                'keterangan' => 'Sampah di TPS RT 07 sudah menumpuk dan belum diangkut selama beberapa hari.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_pengirim' => 'Siti Nurhaliza',
                'tanggal' => Carbon::now()->subDay()->toDateString(),
                'judul' => 'Kebocoran Saluran Air',
                'keterangan' => 'Terdapat kebocoran di saluran air utama dekat masjid, menyebabkan genangan air di jalan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_pengirim' => 'Andi Prasetyo',
                'tanggal' => Carbon::now()->toDateString(),
                'judul' => 'Layanan Kesehatan Terhambat',
                'keterangan' => 'Fasilitas kesehatan di lingkungan kami tidak dapat diakses dengan mudah karena kurangnya transportasi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
