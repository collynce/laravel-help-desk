<?php


namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use App\TicketsCategory;


class TicketsCategoryRepository implements CategoryInterface
{
    public function get()
    {
        return TicketsCategory::all();
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        return TicketsCategory::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $category = TicketsCategory::findOrFail($id);
        $category-> update($request->all());
    }

    public function edit($id)
    {
        return TicketsCategory::findOrFail($id);
    }

    public function destroy($id)
    {
        $category = TicketsCategory::findOrFail($id);
        $category-> delete($id);
    }
}
