<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Kelompok;
use App\Anggota;
use App\Sidang;
use App\User;
use Validator;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarKelompok = DB::table('kelompok')
                            ->join('users AS koor', 'kelompok.id_koordinator', '=', 'koor.id')
                            ->join('users AS asis', 'kelompok.id_asisten', '=', 'asis.id')
                            ->select('kelompok.id', 'koor.name AS koordinator', 'asis.name AS asisten')
                            ->get();
        return view('kelompok.index', compact('daftarKelompok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gerejaKoor = User::where('role', '=', 'koordinator')->orderBy('name')->get();
        $gereja = User::where('role', '=', 'jemaat')->orderBy('name')->get();
        return view('kelompok.create', compact('gereja', 'gerejaKoor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'koordinator' => 'required',
            'asisten' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to('kelompok/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $kelompok = new Kelompok;
            $kelompok->id_koordinator = $input['koordinator'];
            $kelompok->id_asisten = $input['asisten'];
            $kelompok->save();
            return redirect('/kelompok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelompok = DB::table('kelompok')
                    ->join('users AS koor', 'kelompok.id_koordinator', '=', 'koor.id')
                    ->join('users AS asis', 'kelompok.id_asisten', '=', 'asis.id')
                    ->select('kelompok.id', 'koor.name AS koordinator', 'asis.name AS asisten')
                    ->where('kelompok.id' , '=', $id)
                    ->first();
        $listAnggota = DB::table('anggota')
                        ->join('users', 'anggota.id_jemaat', '=', 'users.id')
                        ->select('users.name', 'users.id')
                        ->where('anggota.id_kelompok', '=', $id)
                        ->orderBy('users.name')
                        ->get();
        return view('kelompok.show', compact('kelompok', 'listAnggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelompok = Kelompok::find($id);
        $gerejaKoor = User::where('role', '=', 'koordinator')->orderBy('name')->get();
        return view('kelompok.edit', compact('kelompok', 'gerejaKoor'));
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'koordinator' => 'required',
            'asisten' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to('kelompok/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $kelompok = Kelompok::find($id);
            $kelompok->id_koordinator = $input['koordinator'];
            $kelompok->id_asisten = $input['asisten'];
            $kelompok->save();
            return redirect('/kelompok');
        }
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

    public function newMember($id_kelompok)
    {
        $anggotaKelompok = Anggota::all();
        $arrAnggotaKelompok = [];
        for($idx = 0; $idx < count($anggotaKelompok); $idx++) {
            $arrAnggotaKelompok[$idx] = $anggotaKelompok[$idx]->id_jemaat;
        }

        $gereja = DB::table('users')
                    ->select('users.id', 'users.name')
                    ->whereNotIn('id', $arrAnggotaKelompok)
                    ->where('role', 'jemaat')
                    ->orderBy('name')
                    ->get();
        return view('kelompok.newMember', compact('gereja', 'id_kelompok'));
    }

    public function daftar(Request $request, $id_kelompok)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'anggota' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to('anggota/create/'.$id_kelompok)
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $anggota = new Anggota;
            $anggota->id_kelompok = $id_kelompok;
            $anggota->id_jemaat = $input['anggota'];
            $anggota->save();
            return redirect()->route('kelompok.show', [$id_kelompok]);
        }
    }

    public function hapus($id_kelompok, $id_jemaat)
    {
        $anggota = Anggota::where('id_jemaat', $id_jemaat)->first();
        $anggota->delete();
        return redirect()->route('kelompok.show', [$id_kelompok]);
    }
}
