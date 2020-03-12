<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Court;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courts = Court::all();
        return view('users.create', compact('courts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //dd($request->all());
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->court_id = $request->court_id;
        $user->password = Hash::make($request->password);
        $user->save();
        toast('Success Toast', $user->name . 'User Added !!');
        return redirect()->route('users.index')->with('success', 'User Added!!');

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
        $user = User::findOrFail($id);
        $courts = Court::all();
        $cou = [];
        foreach($courts as $court){
            $cou[$court->id] = $court->name;
        }
        return view('users.edit', compact('user', 'cou'));
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



        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');
        $user->court_id = $request->input('court_id');
        $user->password = Hash::make($request->input('password'));

        $user->save();
        toast('Success Toast', $user->name . 'User Updated !!');
        return redirect()->route('users.index')->with('success', 'User successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user  = User::find($id);
        $user->court()->detach();
        $user->delete();

        toast('Success Toast', $user->name . 'User Deleted !!');
        return redirect()->route('users.index')->with('success', 'User Deleted!!!');
    }
}
