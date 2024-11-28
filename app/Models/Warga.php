<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Warga extends Model implements JWTSubject
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
        'no_kk',
        'nik',
        'agama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_kawin',
        'golongan_darah',
        'pekerjaan',
        'alamat_lengkap',
        'kartu_keluarga',
        'is_verify',
        'password'
    ];


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Menggunakan 'id' sebagai identifier
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return []; // Kamu bisa menambahkan claims khusus jika diperlukan
    }

    /**
     * Get the user's password.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the name of the "primary key" column.
     *
     * @return string
     */
    // public function getAuthIdentifierName()
    // {
    //     return 'nik';
    // }
}
