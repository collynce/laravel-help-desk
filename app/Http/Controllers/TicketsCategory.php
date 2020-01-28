<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

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
//        return TicketsResource::collection($category);
        return view('admin.tickets.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tickets.category.create');
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
//        return new TicketsResource($category);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred, please try again.');

        }
        return redirect()->route('category.index')->with('message', 'Category created successfully.');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->ticket->edit($id);
        return view('admin.tickets.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $$this->ticket->update($request, $id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred, please try again.');

        }
//        return new TicketsResource($category);
        return redirect()->route('category.index')->with('message', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->ticket->destroy($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred, please try again.');
        }
//        return new TicketsResource($category);
        return redirect()->route('category.index')->with('message', 'Deleted successfully.');
    }
}
