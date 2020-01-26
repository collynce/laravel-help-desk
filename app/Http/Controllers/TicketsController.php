<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketsResource;
use App\Interfaces\TicketsInterface;
use App\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    protected $ticket;

    public function __construct(TicketsInterface $ticket)
    {
        $this->middleware('auth');
        $this->ticket = $ticket;
    }

    public function index()
    {
        $ticket = $this->ticket->get();
//        return TicketsResource::collection($ticket);
        return view('admin.tickets.index', compact('ticket'));
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
        try {
            $this->ticket->store($request);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred, please try again.');
        }
        return redirect()->route('tickets.index')->with('message', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $tickets = Tickets::findOrFail($id);
        return view('client.show', compact('tickets'));
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
