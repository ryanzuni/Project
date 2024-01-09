<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pengunjung::query();
    
        // Filter berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->where('date', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->where('date', '<=', $request->input('end_date'));
        }

        // Query data pengunjung dengan menggunakan $query
        $pengunjungs = $query->orderBy('date', 'desc')->paginate(10);

        return view('admin.pengunjungs.index', compact('pengunjungs'));
    }

    public function print(Request $request)
    {  
        $query = Pengunjung::query();

        // Filter berdasarkan tanggal
        if ($request->filled('start_date')) 
    {
        $query->where('date', '>=', $request->input('start_date'));
    }
        if ($request->filled('end_date')) {
        $query->where('date', '<=', $request->input('end_date'));
    }
        $pengunjungs = $query->get();
        return view('admin.pengunjungs.print', compact('pengunjungs'));
    }

    public function create()
    {
        $weeks = $this->getWeeks();
        return view('admin.pengunjungs.create', compact('weeks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required',
            'type_r2' => 'required',
            'type_r4' => 'required',
            'date' => 'required',
            //'bulan' => 'required',
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('admin.pengunjungs.index')
            ->with('success', 'Success Created !');
    }

    public function edit(Pengunjung $pengunjung)
    {
        return view('admin.pengunjungs.edit', compact('pengunjung'));
    }

    public function update(Request $request, Pengunjung $pengunjung)
    {
        $request->validate([
            'total' => 'required',
            'type_r2' => 'required',
            'type_r4' => 'required',
            'date' => 'required',
            //'bulan' => 'required',
        ]);

        $pengunjung->update($request->all());

        return redirect()->route('admin.pengunjungs.index')
            ->with('success', 'Success Updated !');
    }

    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();

        return redirect()->route('admin.pengunjungs.index')
            ->with('success', 'Success Deleted !');
    }
    private function getWeeks()
    {
        $start_date = Carbon::now()->startOfMonth();
        $end_date = Carbon::now()->endOfMonth();

        $weeks = [];

        while ($start_date->lte($end_date)) {
            $weeks[$start_date->weekOfYear] = $start_date->weekOfYear;
            $start_date->addWeek();
    }

        return $weeks;
    }

    public function dashboard()
    {
        // Calculate total for R2 and R4
        //$totalR2 = Pengunjung::where('type_r', 'R2')->sum();
        //$totalR4 = Pengunjung::where('type_r', 'R4')->sum();
        $totalR2 = Pengunjung::sum('type_r2');
        $totalR4 = Pengunjung::sum('type_r4');
        // Fetch paginated data for the table
        $pengunjungs = Pengunjung::paginate(5);

        // Pass the variables to the view
        return view('admin.dashboard', compact('totalR2', 'totalR4', 'pengunjungs'));
    }
}