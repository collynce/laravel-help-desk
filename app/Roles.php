<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable =['roles'];

    public function permissions() {

        return $this->belongsToMany(Permissions::class,'permissions_roles');

    }

    public function users() {

        return $this->belongsToMany(User::class,'users_roles', 'roles_id', 'users_id');

    }

}

