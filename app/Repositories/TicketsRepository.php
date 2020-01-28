<?php


namespace App\Repositories;

use App\Interfaces\TicketsInterface;
use App\Tickets;
use App\TicketsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsRepository implements TicketsInterface
{
    public function get()
    {
        $user = Auth::user()->id;
        return Tickets::with(['comments', 'status', 'engineer', 'user', 'category'])
            ->where('users_id', '=', $user)->get();
    }

    public function create()
    {
        return TicketsCategory::all();
    }

    public function store(Request $request)
    {
        $ticket = new Tickets();
        $ticket->subject= $request->subject;
        $ticket->ticket_category_id= $request->ticket_category_id;
        $ticket->users_id= $request->users_id;
        $ticket->engineers_id= $ticket->autoAssignTicket();
        $ticket->save();
        return $this;
    }

    public function update(Request $request, $id)
    {
        $ticket = Tickets::findOrFail($id);
        $ticket->update($request->all());
    }

    public function show($id)
    {
        return Tickets::with(['comments', 'status', 'engineer', 'user', 'category'])->findOrFail($id);
    }

    public function edit($id)
    {
        return Tickets::findOrFail($id);
    }

    public function destroy($id)
    {
        $ticket = Tickets::findOrFail($id);
        $ticket->delete($id);
    }
}
