<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketsResource;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $roles = Roles::with('permissions')->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($roles);
    }

    public function users()
    {
        $users = User::with(['permissions', 'roles'])->get();
        TicketsResource::withoutWrapping();;
        return TicketsResource::collection($users);
    }

    public function assignRoles(Request $request)
    {
        $role = User::findOrFail($request->users_id);
        $role->roles()->attach($request->roles_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.roles.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $role = new Roles();
//        $role->roles = $request->input('roles');
//        $role->save();
        Roles::create($request->all());
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
    public function update(Request $request)
    {
        $role = Roles::findOrFail($request->roleId);
        $role->permissions()->attach($request->permId);
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
