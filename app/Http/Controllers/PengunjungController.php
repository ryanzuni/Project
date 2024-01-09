<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    public function index()
    {
        return view('pengunjungs.index', compact('pengunjungs'));
    }

    public function show(Pengunjung $pengunjung)
    {
        $pengunjungs = Pengunjung::where('id', '!=', $pengunjung->id)->get();

        return view('pengunjungs.show', compact('pengunjung', 'pengunjungs'));
    }

    public function print(Pengunjung $pengunjung)
    {
        $pengunjungs = Pengunjung::where('id', '!=', $pengunjung->id)->all();

        return view('pengunjungs.print', compact('pengunjung', 'pengunjungs'));
    }
}
