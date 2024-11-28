<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalUsers = DB::table('users')->count();
        $totalRoles = DB::table('roles')->count();

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            'totalRoles' => $totalRoles,
        ]);
    }
}
