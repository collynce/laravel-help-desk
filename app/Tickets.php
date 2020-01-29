<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'subject', 'ticket_category_id', 'users_id', 'engineers_id', 'description'
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

    public function comments()
    {
        return $this->hasMany(Comments::class, 'tickets_id');
    }

    public function engineer()
    {
        return $this->belongsTo(Engineers::class, 'engineers_id', 'id')->with('users');
    }

    public function setAssignedToAttribute($value)
    {

    }

    public function autoAssignTicket()
    {
        $data = Engineers::whereDoesntHave('tickets')->get();
        $total = Engineers::with(['hasOpenTickets', 'tickets'])->get();
        $first_admin = User::all()->where('roles_id', '=', 2)->pluck('id');
        $selected_agent_id = $first_admin;
        $count = 0;
        $lowest_tickets = 3;
        if ($lowest_tickets) {
            foreach ($total as $agent) {
                if ($count == 0) {
                    $lowest_tickets = $agent->tickets->count();
                    $selected_agent_id = $agent->id;
                } else {
                    $tickets_count = $agent->tickets->count();
                    if ($tickets_count < $lowest_tickets) {
                        $lowest_tickets = $tickets_count;
                        $selected_agent_id = $agent->id;
                    }
                }
                $count++;
            }
            return $selected_agent_id;
        } elseif ($data) {
            foreach ($data as $e) {
                $selected_agent_id = $e->id;
            }
            return $selected_agent_id;
        }

    }
}
