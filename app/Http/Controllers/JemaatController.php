<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\User;
use Validator;

class JemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gereja = User::orderBy('name')->get();
        return view('jemaat.index', compact('gereja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jemaat.create');
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
            'name' => 'required|max:255',
            'email' => 'email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return Redirect::to('jemaat/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $newJemaat = new User;
            $newJemaat->name = $input['name'];
            $newJemaat->nickname = $input['nickname'];
            $newJemaat->email = $input['email'];
            $newJemaat->username = $input['username'];
            $newJemaat->password = bcrypt($input['password']);
            $newJemaat->role = $input['role'];
            $newJemaat->status = $input['status'];
            $newJemaat->hall = $input['hall'];
            $newJemaat->gender = $input['gender'];
            $newJemaat->place_of_birth = $input['place_of_birth'];
            $newJemaat->date_of_birth = date("Y-m-d", strtotime($input['date_of_birth']));
            $newJemaat->address = $input['address'];
            $newJemaat->phone = $input['phone'];
            $newJemaat->save();

            // redirect
            Session::flash('message', 'Successfully created jemaat!');
            return Redirect::to('jemaat');
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
        $gereja = User::find($id);
        return view('jemaat.show', compact('gereja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gereja = User::find($id);
        return view('jemaat.edit', compact('gereja'));
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
            'name' => 'required|max:255',
            'email' => 'email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return Redirect::to('jemaat/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $gereja = User::find($id);
            $gereja->name = $input['name'];
            $gereja->email = $input['email'];
            $gereja->role = $input['role'];
            $gereja->status = $input['status'];
            $gereja->hall = $input['hall'];
            // $gereja->username = $input['username'];
            // $gereja->password = bcrypt($input['password']);
            // $gereja->gender = $input['gender'];
            // $gereja->place_of_birth = $input['place_of_birth'];
            // $gereja->date_of_birth = date("Y-m-d", strtotime($input['date_of_birth']));
            $gereja->address = $input['address'];
            $gereja->phone = $input['phone'];
            $gereja->save();

            // redirect
            Session::flash('message', 'Successfully created jemaat!');
            return Redirect::to('jemaat');
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
        // delete
        $gereja = User::find($id);
        $gereja->delete();

        // redirect
        Session::flash('message', 'Successfully deleted jemaat!');
        return Redirect::to('jemaat');
    }
}
