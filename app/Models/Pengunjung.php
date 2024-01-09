<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Pengunjung extends Model
{
    public function AllData()
    {
        return DB::table('pengunjungs')->get();
    }

    protected $fillable = ['total', 'type_r2', 'type_r4', 'date'];
}
