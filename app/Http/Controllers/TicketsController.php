<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketsResource;
use App\Interfaces\TicketsInterface;
use App\Notifications\TicketCreation;
use App\Tickets;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    protected $ticket;

    public function __construct(TicketsInterface $ticket)
    {
        $this->middleware('auth');
        $this->ticket = $ticket;
    }

    public function closedTickets()
    {
        $tickets = Tickets::all()
            ->where('closed_at', '!=', null);
        return view('admin.tickets.closed', compact('tickets'));
    }

    public function getAllTickets()
    {
        $tickets = Tickets::with('user', 'engineer', 'category')->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($tickets);
    }

    public function getOpenTickets()
    {
        $tickets = Tickets::with('user', 'engineer', 'category')->whereNull('closed_at')->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($tickets);
    }

    public function getClosedTickets()
    {
        $tickets = Tickets::with('user', 'engineer', 'category')->whereNotNull(['closed_at', 'engineers_id'])->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($tickets);
    }

    public function unassignedTickets()
    {
        $tickets = Tickets::with('user', 'engineer', 'category')->whereNull('engineers_id')->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($tickets);
    }

    public function index()
    {
        $ticket = $this->ticket->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($ticket);
//        return view('client.index', compact('ticket'));
    }


    public function create()
    {
        $category = $this->ticket->create();
//        TicketsResource::withoutWrapping();
//        return TicketsResource::collection($category);
        return view('client.create', compact('category'));
    }


    public function store(Request $request)
    {
        $this->ticket->store($request);
//        try {
//
//        } catch (\Exception $e) {
//            return redirect()->back()->with('error', 'An error occurred, please try again.');
//        }
        return redirect()->back()->with('message', 'Ticket created successfully.');
    }

    public function assignTicketToEngineer($id)
    {

    }


    public function show($id)
    {
        $tickets = $this->ticket->show($id);
        TicketsResource::withoutWrapping();
        return TicketsResource::collection([$tickets]);
//        return view('client.show')->with('tickets', $tickets);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function closeTicket($id)
    {
        $date = Carbon::now();
        $ticket = Tickets::where('id', $id)->pluck('id');
        $eng = Tickets::where('id', $id)->pluck('engineers_id');
        $owner = Tickets::where('id', $id)->pluck('users_id');
        $users = User::find([$owner, $eng]);
        $details = [
            'greeting' => "Hi",
            'body' => "Ticket number $ticket has been closed",
            'thanks' => 'Thank you...',
        ];
        foreach ($users as $user) {
            $user->notify(new TicketCreation($details));
        }
        Tickets::where('id', $id)->update(['closed_at' => $date, 'reopened_at' => null, 'status' => 'closed']);

    }

    public function reopenTicket($id)
    {
        $date = Carbon::now();
        $ticket = Tickets::where('id', $id)->pluck('id');
        $eng = Tickets::where('id', $id)->pluck('engineers_id');
        $owner = Tickets::where('id', $id)->pluck('users_id');
        $users = User::find([$owner, $eng]);
        $details = [
            'greeting' => "Hi",
            'body' => "Ticket number $ticket has been reopened`" ,
            'thanks' => 'Thank you...',
        ];
        foreach ($users as $user) {
            $user->notify(new TicketCreation($details));
        }
        Tickets::where('id', $id)->update(['closed_at' => null, 'reopened_at' => $date, 'status' => 'pending']);
    }


    public function destroy($id)
    {
        $this->ticket->destroy($id);
    }
}
