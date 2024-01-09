<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengunjung;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $dataPengunjung = Pengunjung::count();
        $userRegistrations = User::count();
        $recentPengunjungs = Pengunjung::orderBy('total', 'desc')
            ->limit(5)
            ->get();
    
    return view('admin.dashboard', compact('recentPengunjungs', 'userRegistrations', 'dataPengunjung'));
}
    }