<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engineers extends Model
{
    protected $table = 'engineers';

    protected $fillable = ['users_id'];

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'engineers_id', 'id');
    }

    public function hasOpenTickets()
    {
        return $this->hasMany(Tickets::class, 'engineers_id', 'id')->whereNotNull('closed_at');
    }

    public function hasClosedTickets()
    {
        return $this->hasMany(Tickets::class, 'engineers_id', 'id')->whereNull('closed_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
