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
}
