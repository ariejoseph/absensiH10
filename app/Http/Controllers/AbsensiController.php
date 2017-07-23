<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\User;
use App\Absensi;
use App\Sidang;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sidang)
    {
        $today = date('Y-m-d');
        $gereja = User::all();
        $hadir = DB::table('absensi')
                    ->select('id_jemaat')
                    ->where([
                        ['id_sidang', '=', $sidang],
                        ['tanggal', '=', $today],
                    ])->get();
        $arrHadir = [];
        for($idx = 0; $idx < count($hadir); $idx++) {
            $arrHadir[$idx] = $hadir[$idx]->id_jemaat;
        }

        $gereja = DB::table('users')
                    ->select('id', 'name')
                    ->whereNotIn('id', $arrHadir)
                    ->orderBy('name')
                    ->get();

        $namaSidang = Sidang::find($sidang)->nama;
        return view('absensi', compact('gereja', 'sidang', 'namaSidang', 'today'));
    }

    public function getDaftarHadir(Request $request)
    {
        // $input = $request->all();
        $sidang = $request->input('sidang');
        $namaSidang = Sidang::find($sidang)->nama;
        $tanggal = $request->input('tanggal');
        $daftarHadir = DB::table('users')
                        ->join('absensi', 'users.id', '=', 'absensi.id_jemaat')
                        ->select('users.id', 'users.name')
                        ->where([
                            ['absensi.id_sidang', '=', $sidang],
                            ['absensi.tanggal', '=', $tanggal],
                        ])
                        ->orderBy('name')
                        ->get();
        return view('hadir', compact('daftarHadir', 'namaSidang', 'tanggal'));
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

    public function absen($sidang, $jemaat)
    {
        $seseorang = new Absensi;
        $seseorang->id_jemaat = $jemaat;
        $seseorang->id_sidang = $sidang;
        $seseorang->tanggal = date("Y-m-d");
        $seseorang->save();
        return redirect()->action(
            'AbsensiController@index', [$sidang]
        );
        // return $this->getDaftarHadir();
    }
}
