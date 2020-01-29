<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketsResource;
use App\Permissions;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
//    public function Permission()
//    {
//        $dev_permission = Permissions::where('permission', 'create-tasks')->first();
//        $manager_permission = Permissions::where('permission', 'edit-users')->first();
//        //RoleTableSeeder.php
//        $dev_role = new Roles();
//        $dev_role->roles = 'developer';
//        $dev_role->save();
//        $dev_role->permissions()->attach($dev_permission);
//
//        $manager_role = new Roles();
//        $manager_role->roles = 'manager';
//        $manager_role->save();
//        $manager_role->permissions()->attach($manager_permission);
//
//        $dev_role = Roles::where('roles', 'developer')->first();
//        $manager_role = Roles::where('roles', 'manager')->first();
//
//        $createTasks = new Permissions();
//        $createTasks->permission = 'create-tasks';
//        $createTasks->save();
//        $createTasks->roles()->attach($dev_role);
//
//        $editUsers = new Permissions();
//        $editUsers->permission = 'edit-users';
//        $editUsers->save();
//        $editUsers->roles()->attach($manager_role);
//
//        $dev_role = Roles::where('roles', 'developer')->first();
//        $manager_role = Roles::where('roles', 'manager')->first();
//        $dev_perm = Permissions::where('permission', 'create-tasks')->first();
//        $manager_perm = Permissions::where('permission', 'edit-users')->first();
//
//        $developer = new User();
//        $developer->name = 'Mahedi Hasan';
//        $developer->email = 'mahedi@gmail.com';
//        $developer->password = bcrypt('secrettt');
//        $developer->save();
//        $developer->roles()->attach($dev_role);
//        $developer->permissions()->attach($dev_perm);
//
//        $manager = new User();
//        $manager->name = 'Hafizul Islam';
//        $manager->email = 'hafiz@gmail.com';
//        $manager->password = bcrypt('secrettt');
//        $manager->save();
//        $manager->roles()->attach($manager_role);
//        $manager->permissions()->attach($manager_perm);
//
//        return redirect()->back();
//    }

    public function index()
    {
        $permissions = Permissions::with('roles')->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $createPermission = new Permissions();
//        $createPermission->permission = $request->permission;
//        $createPermission->save();
//        $createPermission->roles()->attach($request->role);
        Permissions::create($request->all());
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
