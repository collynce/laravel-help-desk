<?php


namespace App\Traits;

use App\Roles;
use App\User;
use App\Permissions;

trait HasRolesAndPermissions
{

    public function roles()
    {
        return $this->hasMany(Roles::class,'id', 'roles_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'permissions');
    }

    public function hasRole(... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('roles', $role)) {
                return true;
            }
        }

        return false;
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    protected function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission);
    }

    protected function getAllPermissions(array $permissions)
    {
        return Permissions::whereIn('name', $permissions)->get();
    }

    protected function givePermissionTo(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null){
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    protected function deletePermissions(... $permissions)
    {

    }
    protected function refreshPermissions(... $permissions)
    {

    }

}
