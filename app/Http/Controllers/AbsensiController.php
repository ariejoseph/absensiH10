<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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
        $namaSidang = Sidang::find($sidang)->nama;
        $arrIdSidang = Sidang::where('nama', $namaSidang)
                        ->select('id')
                        ->get()
                        ->toArray();
        $hadir = Absensi::select('id_jemaat')
                    ->whereIn('id_sidang', $arrIdSidang)
                    ->where('tanggal', '=', $today)
                    ->get()
                    ->toArray();

        $gereja = DB::table('users')
                    ->select('id', 'name')
                    ->whereNotIn('id', $hadir)
                    ->orderBy('name')
                    ->get();

        return view('absensi.index', compact('gereja', 'sidang', 'namaSidang', 'today'));
    }

    public function getDaftarHadir(Request $request)
    {
        // $input = $request->all();
        $namaSidang = $request->input('sidang');
        $listSidang = Sidang::select('id')
                        ->where('nama', $namaSidang)
                        ->orderBy('id')
                        ->get();
        $tanggal = $request->input('tanggal');
        $daftarHadir = DB::table('users')
                        ->join('absensi', 'users.id', '=', 'absensi.id_jemaat')
                        ->select('users.id', 'users.name')
                        ->whereIn('absensi.id_sidang', $listSidang)
                        ->where('absensi.tanggal', '=', $tanggal)
                        ->orderBy('name')
                        ->get();

        // convert to array
        $arrHadir = json_decode(json_encode($daftarHadir), true);

        $yangAbsen = DB::table('users')
                        ->select('id', 'name')
                        ->whereNotIn('id', $arrHadir)
                        ->orderBy('name')
                        ->get();

        $listSidang = Sidang::select('*')
                        ->where('nama', $namaSidang)
                        ->orderBy('id')
                        ->get();

        $dataResponse = [];
        foreach($listSidang as $sidang) {
            $listJemaat = DB::table('users')
                            ->join('absensi', 'users.id', '=', 'absensi.id_jemaat')
                            ->select('users.id', 'users.name')
                            ->where('absensi.id_sidang', $sidang->id)
                            ->where('absensi.tanggal', '=', $tanggal)
                            ->orderBy('name')
                            ->get();
            $dataResponse[$sidang->id] = [];
            $dataResponse[$sidang->id]["sidang"] = $sidang;
            $dataResponse[$sidang->id]["jemaat"] = $listJemaat;
        }
        return view('absensi.hadir', 
                    compact('daftarHadir', 'namaSidang', 'tanggal', 'yangAbsen', 'dataResponse'));
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

    public function absen2(Request $request)
    {
        $input = $request->all();
        $sidang = $input['sidang'];
        if(!empty($input['check_list_jemaat'])) {
            $listJemaat = $input['check_list_jemaat'];
            foreach($listJemaat as $jemaat) {
                $seseorang = new Absensi;
                $seseorang->id_jemaat = $jemaat;
                $seseorang->id_sidang = $sidang;
                $seseorang->tanggal = date("Y-m-d");
                $seseorang->save();
            }
        }
        return redirect()->action(
            'AbsensiController@index', [$sidang]
        );
        // return $this->getDaftarHadir();
    }
}
