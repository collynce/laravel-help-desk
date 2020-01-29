<?php


namespace App\Traits;

use App\Permissions;
use App\Roles;

trait HasRolesAndPermissions
{

    public function givePermissionsTo(...$permissions)
    {

        $permissions = $this->getAllPermissions($permissions);
//        dd($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function withdrawPermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(...$permissions)
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission)
    {

        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission)
    {

        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole(...$roles)
    {

        foreach ($roles as $role) {
            if ($this->roles->contains('roles', $role)) {
                return true;
            }
        }
        return false;
    }

    public function roles()
    {

        return $this->belongsToMany(Roles::class, 'users_roles', 'users_id');

    }

    public function permissions()
    {

        return $this->belongsToMany(Permissions::class, 'users_permissions', 'users_id');

    }

    protected function hasPermission($permission)
    {
        return (bool)$this->permissions->where('permission', $permission->permission)->count();
    }

    protected function getAllPermissions(array $permissions)
    {
        return Permissions::whereIn('permission', $permissions)->get();

    }
}
