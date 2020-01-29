<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['permission'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'permissions_roles');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_permissions');
    }
}
