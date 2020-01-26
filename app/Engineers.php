<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engineers extends Model
{
    protected $table = 'engineers';

    protected $fillable = ['users_id', 'tickets_id'];

    public function hasOpenTickets()
    {
        return $this->hasMany(Tickets::class, 'id', 'tickets_id')->whereNotNull('closed_at');
    }

    public function hasClosedTickets()
    {
        return $this->hasMany(Tickets::class, 'id', 'tickets_id')->whereNull('closed_at');
    }
}
