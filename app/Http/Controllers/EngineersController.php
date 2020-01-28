<?php

namespace App\Http\Controllers;

use App\Engineers;
use App\Http\Resources\TicketsResource;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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
        $tickets = Engineers::where('users_id','=', $user)->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($tickets);
    }

    public function getAllEngineers()
    {
        $engineers = Engineers::all();
        $roles = Roles::where('roles', '=', 'staff')->pluck('id');
        $users = User::where('roles_id', '=', $roles)->get();
        return view('admin.engineer.all')->with('engineers', $engineers)->with('users', $users);
    }

    public function create()
    {

        return view('admin.engineer.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
