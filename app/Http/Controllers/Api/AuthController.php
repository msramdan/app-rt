<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthController extends Controller
{
    /**
     * Handle login and generate JWT token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string',
            'password' => 'required|string|min:6',
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

    /**
     * Logout the user and invalidate the token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token tidak ditemukan!',
            ], 400);
        }

        $removeToken = JWTAuth::invalidate($token);

        if ($removeToken) {
            return response()->json([
                'status' => 'success',
                'message' => 'Logout berhasil!',
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Logout gagal!',
        ], 500);
    }
}
