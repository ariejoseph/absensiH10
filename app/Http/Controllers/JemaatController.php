<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\User;
use Auth;
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
        $hall = Auth::user()->hall;
        $routeName = Route::currentRouteName();
        if($routeName == 'anak') {
            $gereja = User::where([['kategori', 'anak'], ['hall', $hall]])->orderBy('name')->paginate(15);
            return view('jemaat.anak.index', compact('gereja'));
        } else if($routeName == 'remaja') {
            $gereja = User::where([['kategori', 'remaja'], ['hall', $hall]])->orderBy('name')->paginate(15);
            return view('jemaat.remaja.index', compact('gereja'));
        } else if($routeName == 'pemuda') {
            $gereja = User::where([['kategori', 'pemuda'], ['hall', $hall]])->orderBy('name')->paginate(15);
            return view('jemaat.pemuda.index', compact('gereja'));
        } else {
            $gereja = User::where([['kategori', 'umum'], ['hall', $hall]])->orderBy('name')->paginate(15);
            return view('jemaat.index', compact('gereja'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = Route::currentRouteName();
        if($routeName == 'regisAnak') {
            return view('jemaat.anak.create');
        } else if($routeName == 'regisRemaja') {
            return view('jemaat.remaja.create');
        } else if($routeName == 'regisPemuda') {
            return view('jemaat.pemuda.create');
        } else {
            return view('jemaat.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $routeName = Route::currentRouteName();
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'nickname' => 'required|max:255',
            'email' => 'email|max:255|unique:users',
            'username' => 'max:255|unique:users',
            'hall' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            if($routeName == 'saveAnak') {
                return Redirect::to('anak/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else if($routeName == 'saveRemaja') {
                return Redirect::to('remaja/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else if($routeName == 'savePemuda') {
                return Redirect::to('pemuda/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                return Redirect::to('jemaat/create')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            }
        } else {
            // store
            $newJemaat = new User;
            $newJemaat->name = $input['name'];
            $newJemaat->nickname = $input['nickname'];
            $newJemaat->email = $input['email'];
            $newJemaat->username = $input['username'];
            $newJemaat->password = bcrypt($input['password']);
            if(isset($input['kategori'])) {
                $newJemaat->kategori = $input['kategori'];
            }
            if(isset($input['role'])) {
                $newJemaat->role = $input['role'];
            }
            if(isset($input['status'])) {
                $newJemaat->status = $input['status'];
            }
            $newJemaat->hall = $input['hall'];
            $newJemaat->gender = $input['gender'];
            $newJemaat->place_of_birth = $input['place_of_birth'];
            $newJemaat->date_of_birth = date("Y-m-d", strtotime($input['date_of_birth']));
            $newJemaat->address = $input['address'];
            $newJemaat->phone = $input['phone'];
            $newJemaat->save();

            // redirect
            if($routeName == 'saveAnak') {
                Session::flash('message', 'Successfully created anak!');
                return Redirect::to('anak');
            } else if($routeName == 'saveRemaja') {
                Session::flash('message', 'Successfully created remaja!');
                return Redirect::to('remaja');
            } else if($routeName == 'savePemuda') {
                Session::flash('message', 'Successfully created pemuda!');
                return Redirect::to('pemuda');
            } else {
                Session::flash('message', 'Successfully created jemaat!');
                return Redirect::to('jemaat');
            }
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
        $routeName = Route::currentRouteName();
        if($routeName == 'showAnak') {
            $gereja = User::find($id);
            return view('jemaat.anak.show', compact('gereja'));
        } else if($routeName == 'showRemaja') {
            $gereja = User::find($id);
            return view('jemaat.remaja.show', compact('gereja'));
        } else if($routeName == 'showPemuda') {
            $gereja = User::find($id);
            return view('jemaat.pemuda.show', compact('gereja'));
        } else {
            $gereja = User::find($id);
            return view('jemaat.show', compact('gereja'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routeName = Route::currentRouteName();
        if($routeName == 'editAnak') {
            $gereja = User::find($id);
            return view('jemaat.anak.edit', compact('gereja'));
        } else if($routeName == 'editRemaja') {
            $gereja = User::find($id);
            return view('jemaat.remaja.edit', compact('gereja'));
        } else if($routeName == 'editPemuda') {
            $gereja = User::find($id);
            return view('jemaat.pemuda.edit', compact('gereja'));
        } else {
            $gereja = User::find($id);
            return view('jemaat.edit', compact('gereja'));
        }
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
        $routeName = Route::currentRouteName();
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'nickname' => 'required|max:255',
            'email' => 'email|max:255|unique:users',
            'hall' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            if($routeName == 'updateAnak') {
                return Redirect::to('anak/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else if($routeName == 'updateRemaja') {
                return Redirect::to('remaja/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else if($routeName == 'updatePemuda') {
                return Redirect::to('pemuda/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                return Redirect::to('jemaat/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            }
        } else {
            // store
            $gereja = User::find($id);
            $gereja->name = $input['name'];
            $gereja->nickname = $input['nickname'];
            $gereja->email = $input['email'];
            if(isset($input['kategori'])) {
                $gereja->kategori = $input['kategori'];
            }
            if(isset($input['role'])) {
                $gereja->role = $input['role'];
            }
            if(isset($input['status'])) {
                $gereja->status = $input['status'];
            }
            $gereja->hall = $input['hall'];
            $gereja->username = $input['username'];
            $gereja->password = bcrypt($input['password']);
            // $gereja->gender = $input['gender'];
            // $gereja->place_of_birth = $input['place_of_birth'];
            // $gereja->date_of_birth = date("Y-m-d", strtotime($input['date_of_birth']));
            $gereja->address = $input['address'];
            $gereja->phone = $input['phone'];
            $gereja->save();

            // redirect
            if($routeName == 'updateAnak') {
                Session::flash('message', 'Successfully updated anak!');
                return Redirect::to('anak');
            } else if($routeName == 'updateRemaja') {
                Session::flash('message', 'Successfully updated remaja!');
                return Redirect::to('remaja');
            } else if($routeName == 'updatePemuda') {
                Session::flash('message', 'Successfully updated pemuda!');
                return Redirect::to('pemuda');
            } else {
                Session::flash('message', 'Successfully updated jemaat!');
                return Redirect::to('jemaat');
            }
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
