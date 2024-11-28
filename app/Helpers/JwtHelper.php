<?php

namespace App\Helpers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JwtHelper
{
    public static function validateToken()
    {
        try {
            $token = JWTAuth::getToken();

            if (!$token) {
                return [
                    'status' => false,
                    'message' => 'Token tidak ditemukan!',
                    'code' => 400
                ];
            }

            JWTAuth::checkOrFail($token);

            return [
                'status' => true,
                'message' => 'Token valid',
                'code' => 200
            ];
        } catch (TokenInvalidException $e) {
            return [
                'status' => false,
                'message' => 'Token tidak valid!',
                'code' => 400
            ];
        } catch (TokenExpiredException $e) {
            return [
                'status' => false,
                'message' => 'Token telah kedaluwarsa!',
                'code' => 400
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Terjadi kesalahan saat memvalidasi token!',
                'code' => 500
            ];
        }
    }
}
