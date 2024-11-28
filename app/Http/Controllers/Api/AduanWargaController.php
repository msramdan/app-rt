<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AduanWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\JwtHelper;
use Exception;

class AduanWargaController extends Controller
{

    public function getAllAduan(Request $request)
    {
        // Validasi token menggunakan helper
        $validation = JwtHelper::validateToken();

        if (!$validation['status']) {
            return response()->json([
                'status' => 'error',
                'message' => $validation['message'],
            ], $validation['code']);
        }

        try {
            $query = AduanWarga::query();

            // Apply filter if start_date is provided
            if ($request->has('start_date')) {
                $query->where('tanggal', '>=', $request->start_date);
            }

            // Apply filter if end_date is provided
            if ($request->has('end_date')) {
                $query->where('tanggal', '<=', $request->end_date);
            }

            // Execute the query to fetch filtered data
            $aduans = $query->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Data aduan berhasil diambil.',
                'data' => $aduans,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data aduan.',
            ], 500);
        }
    }



    /**
     * Membuat aduan baru (complaint).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAduan(Request $request)
    {
        // Validasi token menggunakan helper
        $validation = JwtHelper::validateToken();

        if (!$validation['status']) {
            return response()->json([
                'status' => 'error',
                'message' => $validation['message'],
            ], $validation['code']);
        }

        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'nama_pengirim' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        // Membuat aduan baru
        try {
            $aduan = AduanWarga::create([
                'nama_pengirim' => $request->nama_pengirim,
                'tanggal' => $request->tanggal,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Aduan berhasil dibuat.',
                'data' => $aduan,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aduan gagal dibuat. Silakan coba lagi.',
            ], 500);
        }
    }
}
