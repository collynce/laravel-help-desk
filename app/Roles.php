<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
   public function permissions()
   {
       return $this->belongsToMany(Permissions::class, 'roles_has_permissions');
   }

}
