<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DaftarPeran;
use Validator;

class DaftarPeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarPeran = DaftarPeran::all();
        return view('daftarPeran.index', compact('daftarPeran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftarPeran.create');
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
            'peran' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to('daftarPeran/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $peran = new DaftarPeran;
            $peran->peran = $input['peran'];
            $peran->save();
            return redirect()->route('daftarPeran.index');
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
        $daftarPeran = DaftarPeran::find($id);
        return view('daftarPeran.edit',compact('daftarPeran'));
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
        $peran = DaftarPeran::find($id);
        $peran->delete();
        return redirect('daftarPeran');
    }
}
