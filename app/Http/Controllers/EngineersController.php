<?php

namespace App\Http\Controllers;

use App\Engineers;
use App\Http\Resources\TicketsResource;
use App\Roles;
use App\Tickets;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EngineersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __construct()
    {
//        $this->middleware('role:admin');

    }

    public function index()
    {
        $user = Auth::user()->id;
       $eng = Engineers::where('users_id', $user)->pluck('id');
        $tickets = Tickets::with(['user', 'category'])->where('engineers_id', $eng)->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($tickets);
    }

    public function getAllEngineers()
    {
        $engineers = Engineers::all();
        $users = Roles::all()->where('roles', '=', 'staff');
        return view('admin.engineer.all')->with('engineers', $engineers)->with('users', $users);
    }
    public function getEngineers()
    {
        $engineers = Engineers::with('users')->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($engineers);
//        return view('admin.engineer.all')->with('engineers', $engineers);
    }

    public function create()
    {
//        TicketsResource::withoutWrapping();
//        return TicketsResource::collection($roles);
    }

    public function store(Request $request)
    {
        Engineers::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
