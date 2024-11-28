<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\JwtHelper;
use App\Models\KegiatanWarga;
use Exception;

class KegiatanWargaController extends Controller
{
    public function getAllKegiatan(Request $request)
    {
        $validation = JwtHelper::validateToken();

        if (!$validation['status']) {
            return response()->json([
                'status' => 'error',
                'message' => $validation['message'],
            ], $validation['code']);
        }

        try {
            $query = KegiatanWarga::query();

            // Apply filter if start_date is provided
            if ($request->has('start_date')) {
                $query->where('tanggal_kegiatan', '>=', $request->start_date);
            }

            // Apply filter if end_date is provided
            if ($request->has('end_date')) {
                $query->where('tanggal_kegiatan', '<=', $request->end_date);
            }

            // Order by id in descending order
            $query->orderBy('id', 'desc');

            // Execute the query to fetch filtered data
            $kegiatans = $query->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Data kegiatan berhasil diambil.',
                'data' => $kegiatans,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data kegiatan.',
            ], 500);
        }
    }
}
