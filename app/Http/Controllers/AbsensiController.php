<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Jemaat;
use App\Absensi;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gereja = Jemaat::all();
        $hadir = DB::table('absensi')
                    ->select('id_jemaat')
                    ->get();
        $arrHadir = [];
        for($idx = 0; $idx < count($hadir); $idx++) {
            $arrHadir[$idx] = $hadir[$idx]->id_jemaat;
        }
        $gereja = DB::table('jemaat')
                    ->select('id', 'nama')
                    ->whereNotIn('id', $arrHadir)
                    ->get();
        return view('absensi', compact('gereja'));
    }

    public function getDaftarHadir()
    {
        // $daftarHadir = Absensi::all();
        $daftarHadir = DB::table('jemaat')
                        ->join('absensi', 'jemaat.id', '=', 'absensi.id_jemaat')
                        ->select('jemaat.id', 'jemaat.nama')
                        ->get();
        return view('sidang', compact('daftarHadir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function absen($id, $sidang)
    {
        $seseorang = new Absensi;
        $seseorang->id_jemaat = $id;
        $seseorang->sidang = $sidang;
        $seseorang->tanggal = date("Y-m-d");
        $seseorang->save();
        return redirect('/absensi');
        // return $this->getDaftarHadir();
    }
}
