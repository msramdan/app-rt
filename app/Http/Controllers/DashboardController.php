<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalUsers = DB::table('users')->count();
        $wargas = DB::table('wargas')->count();
        $kegiatan_wargas = DB::table('kegiatan_wargas')->count();
        $aduan_wargas = DB::table('aduan_wargas')->count();

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'wargas' => $wargas,
            'kegiatan_wargas' => $kegiatan_wargas,
            'aduan_wargas' => $aduan_wargas,
        ]);
    }
}
