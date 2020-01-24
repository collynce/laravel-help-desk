<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\TicketsResource;

class TicketsCategory extends Controller
{
    protected $ticket;
    public function __construct(CategoryInterface $ticket)
    {
//        $this->middleware('auth', ['except'=>'show']);
        $this->ticket = $ticket;
    }
    public function index()
    {
        $category = $this->ticket->get();
        return TicketsResource::collection($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TicketsResource
     */
    public function store(Request $request)
    {
        $category = $this->ticket->store($request);
        return new TicketsResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $category = $this->ticket->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return TicketsResource
     */
    public function update(Request $request, $id)
    {
        $category = $this->ticket->update($request, $id);
        return new TicketsResource($category);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return TicketsResource
     */
    public function destroy($id)
    {
        $category = $this->ticket->destroy($id);
        return new TicketsResource($category);
    }
}
