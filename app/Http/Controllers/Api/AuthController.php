<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use App\Helpers\JwtHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        // Find the user by NIK
        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga) {
            return response()->json([
                'status' => 'error',
                'message' => 'Warga tidak ditemukan',
            ], 404);
        }

        // Verify the password
        if (!Hash::check($request->password, $warga->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kredensial tidak valid',
            ], 401);
        }

        // Check if the user is verified
        if ($warga->is_verify === 'No') {
            return response()->json([
                'status' => 'error',
                'message' => 'Akun belum terverifikasi',
            ], 403);
        }

        // Generate JWT token
        try {
            $token = JWTAuth::fromUser($warga);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tidak dapat membuat token',
            ], 500);
        }

        // Return the token and user data in consistent format
        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil',
            'data' => [
                'token' => $token,
                'warga' => $warga,
            ],
        ], 200);
    }

    public function logout(Request $request)
    {
        $validation = JwtHelper::validateToken();

        if (!$validation['status']) {
            return response()->json([
                'status' => 'error',
                'message' => $validation['message'],
            ], $validation['code']);
        }

        try {
            $token = JWTAuth::getToken();
            JWTAuth::invalidate($token);

            return response()->json([
                'status' => 'success',
                'message' => 'Logout berhasil!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat logout!',
            ], 500);
        }
    }

    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'no_kk' => 'required|string',
            'nik' => 'required|string|unique:wargas',
            'agama' => 'required|in:Islam,Kristen Protestan,Kristen Katolik,Hindu,Buddha,Konghucu',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'status_kawin' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'golongan_darah' => 'required|in:A,B,AB,O',
            'pekerjaan' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'kartu_keluarga' => 'nullable|file|mimes:jpeg,png,pdf|max:10240', // Nullable field
            'password' => 'required|string|min:6',
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        // Handle file upload if available
        $filePath = null;
        if ($request->hasFile('kartu_keluarga')) {
            $file = $request->file('kartu_keluarga');
            // Generate a unique name for the file
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Store the file in the local storage folder
            $filePath = $file->storeAs('uploads/kartu-keluargas', $fileName, 'public');
        }

        // Insert user data into the database
        try {
            $wargaId = DB::table('wargas')->insertGetId([
                'nama' => $request->nama,
                'no_kk' => $request->no_kk,
                'nik' => $request->nik,
                'agama' => $request->agama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status_kawin' => $request->status_kawin,
                'golongan_darah' => $request->golongan_darah,
                'pekerjaan' => $request->pekerjaan,
                'alamat_lengkap' => $request->alamat_lengkap,
                'kartu_keluarga' => $filePath, // Store the file path in the database (nullable)
                'password' => Hash::make($request->password), // Hash the password
                'is_verify' => 'No', // Default to No for unverified accounts
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan data warga: ' . $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Pendaftaran berhasil',
            'data' => [
                'warga_id' => $wargaId,
            ],
        ], 200);
    }


}
