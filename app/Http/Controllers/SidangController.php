<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Requests;
use App\Sidang;
use Validator;

class SidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarSidang = Sidang::all();
        $routeName = Route::currentRouteName();
        if($routeName == 'absensi') {
			return view('sidang.absensiSidang', compact('daftarSidang'));
        } elseif ($routeName == 'hadir') {
        	return view('sidang.daftarSidang', compact('daftarSidang'));
    	} else { // routeName == 'sidang'
            return view('sidang.index', compact('daftarSidang'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sidang.create');
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
            'sidang' => 'required|max:255',
        ]);

        $sidang = new Sidang;
        $sidang->nama = $input['nama'];
        $sidang->sesi = $input['sesi'];
        $sidang->start = $input['start'];
        $sidang->end = $input['end'];
        $sidang->lokasi = $input['lokasi'];
        $sidang->kelompok = $input['kelompok'];
        $sidang->save();

        return redirect()->route('sidang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $sidang = Sidang::find($id);
        // return view('sidang.show', compact('sidang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sidang = Sidang::find($id);
        return view('sidang.edit', compact('sidang'));
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
}
