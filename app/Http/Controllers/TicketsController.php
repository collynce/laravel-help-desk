<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketsResource;
use App\Interfaces\TicketsInterface;
use App\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    protected $ticket;

    public function __construct(TicketsInterface $ticket)
    {
//        $this->middleware('auth');
        $this->ticket = $ticket;
    }

    public function index()
    {
        $ticket = $this->ticket->get();
        TicketsResource::withoutWrapping();
        return TicketsResource::collection($ticket);
//        return view('client.index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = $this->ticket->create();
//        TicketsResource::withoutWrapping();
//        return TicketsResource::collection($category);
        return view('client.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->ticket->store($request);
//        try {
//
//        } catch (\Exception $e) {
//            return redirect()->back()->with('error', 'An error occurred, please try again.');
//        }
        return redirect()->route('tickets.index')->with('message', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id)
    {
        $tickets = $this->ticket->show($id);
        TicketsResource::withoutWrapping();
        return TicketsResource::collection([$tickets]);
//        return view('client.show')->with('tickets', $tickets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function closeTicket($id)
    {
        $date = Carbon::now();
        Tickets::where('id', $id)->update(['closed_at' => $date, 'reopened_at' => null]);

    }

    public function reopenTicket($id)
    {
        $date = Carbon::now();
        Tickets::where('id', $id)->update(['closed_at' => null, 'reopened_at' => $date]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
