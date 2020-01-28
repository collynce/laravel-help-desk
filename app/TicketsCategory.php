<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsCategory extends Model
{
    protected $table = 'ticket_category';

    protected $fillable = [
        'category',
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}
