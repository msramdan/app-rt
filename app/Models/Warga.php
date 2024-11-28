<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['nama', 'no_kk', 'nik', 'agama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'status_kawin', 'golongan_darah', 'pekerjaan', 'alamat_lengkap', 'kartu_keluarga','is_verify','password'];

}
