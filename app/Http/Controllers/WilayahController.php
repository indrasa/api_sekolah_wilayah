<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::all();
        return response()->json($wilayah);
    }

    public function find_by_name($kecamatan)
    {
        $wilayah = Wilayah::where('nama', 'like', '%' . $kecamatan . '%')
            ->where('kode', 'like', '__.__.__')->limit(10)->get();
        return response()->json($wilayah);
    }

    public function detail($id)
    {


        $id = explode('.', $id);

        $id = [
            'provinsi' => $id[0] ?? null,
            'kabupaten' => $id[1] ?? null,
            'kecamatan' => $id[2] ?? null,
            'kelurahan' => $id[3] ?? null,
        ];

        $provinsi = Wilayah::where('kode', 'like', "{$id['provinsi']}")->first()->nama;
        $kabupaten = Wilayah::where('kode', 'like', "{$id['provinsi']}.{$id['kabupaten']}")->first()->nama;
        $kecamatan = Wilayah::where('kode', 'like', "{$id['provinsi']}.{$id['kabupaten']}.{$id['kecamatan']}")->first()->nama;
        // $kelurahan = Wilayah::where('kode', 'like', "{$id['provinsi']}.{$id['kabupaten']}.{$id['kecamatan']}.{$id['kelurahan']}")->first()->nama;


        $wilayah = [
            'provinsi' => $provinsi ?? null,
            'kabupaten' => $kabupaten ?? null,
            'kecamatan' => $kecamatan ?? null,
            // 'kelurahan' => $kelurahan ?? null,
        ];

        return response()->json($wilayah);
    }
}
