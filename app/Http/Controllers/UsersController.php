<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin($id){
      User::where('id', $id)->update(['role'=>'admin']);
      //$user->save();
        session()->flash('success', 'great you are now an admin');

        return redirect(route('users.index'));
    }
}
