<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'subject', 'assigned_to', 'ticket_category_id', 'users_id', 'engineers_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @var Engineers[]|\Illuminate\Database\Eloquent\Collection
     */

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
        return $this->belongsTo(Engineers::class, 'engineers_id');
    }

    public function setAssignedToAttribute($value)
    {

    }

    public function autoSelectAssignee()
    {
        $eng = Engineers::all();
//        $all->hasOpenTickets()->get();
//        $eng =  (new Engineers)->hasOpenTickets()->get();
        $count = 0;
        $lowest_tickets = 1000000;
        foreach ($eng as $e){
            if ($count == 0) {
                $lowest_tickets = $e->count();
            }else{
                $tickets = $e->count();
                if ($tickets < $lowest_tickets){
                    $lowest_tickets = $tickets;
                }
            }
            $count++;
        }
        $this->engineers_id = $eng;
        return $this;
    }
}
