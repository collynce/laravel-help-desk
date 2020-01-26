<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table ='comments';

    protected $fillable =[
        'comment', 'users_id', 'tickets_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'tickets_id');
    }

}
