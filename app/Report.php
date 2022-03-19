<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $guarded=[];


    public function comment()
    {
        return $this->belongsTo(MovieComment::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(movie::class);
    }
}
