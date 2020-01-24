<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = User::all();
        return view('home', compact('user'));

    }
    public function client()
    {
//        dd($this->can('manage-users'));
        return view('client.index');
    }

}
