<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DaftarSidang;
use Validator;

class DaftarSidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarSidang = DaftarSidang::all();
        return view('daftarSidang.index', compact('daftarSidang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftarSidang.create');
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
            'sidang' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to('daftarSidang/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $sidang = new DaftarSidang;
            $sidang->sidang = $input['sidang'];
            $sidang->save();
            return redirect()->route('daftarSidang.index');
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
        $sidang = DaftarSidang::find($id);
        return view('daftarSidang.edit',compact('sidang'));
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
        $sidang = DaftarSidang::find($id);
        $sidang->delete();
        return redirect('daftarSidang');
    }
}
