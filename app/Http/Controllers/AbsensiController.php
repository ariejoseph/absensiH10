<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Absensi;
use App\Anggota;
use App\Kelompok;
use App\Sidang;
use App\User;
use Auth;

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

        $userId = Auth::user()->id;
        $idKelompok = Kelompok::where('sidang', $namaSidang)
                        ->orWhere([
                            ['id_koordinator', $userId],
                            ['id_asisten', $userId]
                        ])
                        ->select('id')
                        ->get()
                        ->toArray();
        
        $arrIdSidang = Sidang::where('nama', $namaSidang)
                        ->select('id')
                        ->get()
                        ->toArray();
        $hadir = Absensi::select('id_jemaat')
                    ->whereIn('id_sidang', $arrIdSidang)
                    ->where('tanggal', '=', $today)
                    ->get()
                    ->toArray();

        if(!empty($idKelompok)) {
            $gereja = DB::table('anggota')
                        ->join('users', 'users.id', '=', 'anggota.id_jemaat')
                        ->select('users.id', 'users.name', 'anggota.id_kelompok')
                        ->whereIn('anggota.id_kelompok', $idKelompok)
                        ->whereNotIn('users.id', $hadir)
                        ->orderBy('users.name')
                        ->get();

            $idKoorAsis = Kelompok::where('id', $idKelompok)
                                ->select('id_koordinator', 'id_asisten')
                                ->get()
                                ->toArray();

            $arrKoorAsis = [$idKoorAsis[0]['id_koordinator'], $idKoorAsis[0]['id_asisten']];
            $koordinator = User::whereIn('id', $arrKoorAsis)->select('id', 'name')->get();
        } else {
            return response('Maaf, kamu bukan koordinator absen :)', 401);
        }
        // var_dump($koordinator);
        return view('absensi.index', compact('koordinator', 'gereja', 'sidang', 'namaSidang', 'today'));
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

        if($namaSidang == 'Sidang Anak-Anak') {
            $yangAbsen = DB::table('users')
                            ->select('id', 'name')
                            ->where('kategori', 'anak')
                            ->whereNotIn('id', $arrHadir)
                            ->orderBy('name')
                            ->get();
        } else if($namaSidang == 'Sidang Remaja') {
            $yangAbsen = DB::table('users')
                            ->select('id', 'name')
                            ->where('kategori', 'remaja')
                            ->whereNotIn('id', $arrHadir)
                            ->orderBy('name')
                            ->get();
        } else if($namaSidang == 'Sidang Pemuda') {
            $yangAbsen = DB::table('users')
                            ->select('id', 'name')
                            ->where('kategori', 'pemuda')
                            ->whereNotIn('id', $arrHadir)
                            ->orderBy('name')
                            ->get();
        } else if($namaSidang == 'Sidang Saudari') {
            $yangAbsen = DB::table('users')
                            ->select('id', 'name')
                            ->where([['kategori', 'umum'], ['gender', 'perempuan']])
                            ->whereNotIn('id', $arrHadir)
                            ->orderBy('name')
                            ->get();
        } else {
            $yangAbsen = DB::table('users')
                            ->select('id', 'name')
                            ->where('kategori', 'umum')
                            ->whereNotIn('id', $arrHadir)
                            ->orderBy('name')
                            ->get();
        }

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
