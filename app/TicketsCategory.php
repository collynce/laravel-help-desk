<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsCategory extends Model
{
    protected $table = 'ticket_category';

    protected $fillable = [
        'category',
    ];
}
