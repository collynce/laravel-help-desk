<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable=[
        'subject', 'ticket_category_id','users_id'
    ];
    public function category()
    {
        return $this->belongsTo(TicketsCategory::class, 'ticket_category_id');
    }
}
