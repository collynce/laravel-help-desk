<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface TicketsInterface
{
    public function get();
    public function create();
    public function store(Request $request);
    public function update(Request $request, $id);
    public function edit($id);
    public function destroy($id);
}
