<?php

namespace App\Http\Controllers;
use  Session;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adduser()
    {
        return view('admin.users.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        $this->validate($data, [
            //'title' => 'required|text|max:255',
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);


       $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

       $profile =  Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/users/nadeem.jpg'
        ]);

       Session::flash('success','New User Created Succcessfully!..');

        return redirect()->route('users');
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

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin  = 1;

        $user->save();

        Session::flash('success','Succcessfully Changed User Permission!..');

        return redirect()->route('users');
    }

     public function notadmin($id)
    {
        $user = User::find($id);
        $user->admin  = 0;

        $user->save();

        Session::flash('success','Succcessfully Changed User Permission!..');

        return redirect()->route('users');
    }
}
