<?php


namespace App\Repositories;

use App\Interfaces\TicketsInterface;
use App\Tickets;
use App\TicketsCategory;
use Illuminate\Http\Request;

class TicketsRepository implements TicketsInterface
{
    public function get()
    {
        return Tickets::all();
    }

    public function create()
    {
        return TicketsCategory::all();
    }

    public function store(Request $request)
    {
        return Tickets::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $ticket = Tickets::findOrFail($id);
        $ticket->update($request->all());
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
