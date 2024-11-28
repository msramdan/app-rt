<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanWarga extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['tanggal_kegiatan', 'judul_kegiatan', 'keterangan_kegiatan'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['tanggal_kegiatan' => 'date:d/m/Y', 'judul_kegiatan' => 'string', 'keterangan_kegiatan' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];



}
