<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = USER::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'email'  => 'required',
            'password'  => 'required|min:3'
        ]);

        $user = new User();
        $user->name = request('username');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        //$user->remember_token = 'sdfjhfjdslkjdljkfsahjfdaslkjfakj';
        $user->save();

        return redirect()->route('users.index')->withFlashMessage('You have succesfully added a new user!');

        //dd($request['username']);
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
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
        
        return view('users.edit', compact('user'));
    
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

        request()->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'email'  => 'required',
            'password'  => 'required|min:3'
        ]);
        
        $user = User::findOrFail($id);
        $user->name = request('username');
        $user->email = request('email');
        if(!empty(request('password'))){
            $user->password = bcrypt(request('password'));
        }
        $user->save();

        return redirect()->route('users.index')->withFlashMessage('You have succesfully updated '.$user->name.'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->withFlashMessage('You have succesfully deleted a user!');
    }
}
