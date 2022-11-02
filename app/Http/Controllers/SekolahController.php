<?php

namespace App\Http\Controllers;

use App\Http\Resources\SekolahCollection;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index(){
        $sekolah = Sekolah::all();
        return response()->json($sekolah);
    }

    public function find_by_name($nama_sekolah){
        $sekolah = Sekolah::select('sekolah', 'npsn', 'kabupaten_kota', 'kecamatan', 'propinsi')->where('sekolah', 'like', '%' . $nama_sekolah . '%')->limit(5)->get();
        return response()->json($sekolah);
    }
}
