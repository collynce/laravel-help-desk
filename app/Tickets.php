<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'subject', 'assigned_to', 'ticket_category_id', 'users_id'
    ];

    public function category()
    {
        return $this->belongsTo(TicketsCategory::class, 'ticket_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'tickets_id');
    }

    public function engineer()
    {
        return $this->belongsTo(Engineers::class, 'tickets_id');
    }

    public function setAssignedToAttribute($value)
    {

    }

    public function autoSelectAssignee()
    {
        $eng = $this->engineers_id;
    }
}
