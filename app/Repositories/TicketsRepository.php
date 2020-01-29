<?php


namespace App\Repositories;

use App\Engineers;
use App\Interfaces\TicketsInterface;
use App\Notifications\TicketCreation;
use App\Tickets;
use App\TicketsCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TicketsRepository implements TicketsInterface
{
    public function get()
    {
        $user = Auth::user()->id;
        return Tickets::with(['comments', 'engineer', 'user', 'category'])
            ->where('users_id', '=', $user)->get();
    }

    public function create()
    {
        return TicketsCategory::all();
    }

    public function store(Request $request)
    {
        try {
            $ticket = new Tickets();
            $ticket->subject = $request->subject;
            $ticket->ticket_category_id = $request->ticket_category_id;
            $ticket->users_id = $request->users_id;
            $ticket->description = $request->description;
            $ticket->engineers_id = $ticket->autoAssignTicket();
            $eng = Engineers::where('id', $ticket->autoAssignTicket())->pluck('users_id');
            $users = User::find([$request->users_id, $eng]);
            $details = [
                'greeting' => "Hi",
                'body' => 'A New Ticket has been created',
                'thanks' => 'Thank you...',
            ];
            foreach ($users as $user) {
                $user->notify(new TicketCreation($details));
            }
            $ticket->save();
            Log::info('Post created successfully');
        } catch (\Exception $e) {
            Log::error('An error occurred ' . $e);
            return redirect()->back()->with('error', 'An error occurred, please try again.');
        }
        return redirect()->back()->with('message', 'Ticket created successfully.');

    }

    public function update(Request $request, $id)
    {
        try {
            $ticket = Tickets::findOrFail($id);
            $ticket->update($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred, please try again.');
        }
        return redirect()->back()->with('message', 'Updated successfully.');
    }

    public function show($id)
    {
        return Tickets::with(['comments', 'engineer', 'user', 'category'])->findOrFail($id);
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
