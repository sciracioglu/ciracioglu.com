<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yazi extends Model
{
    protected $table = 'yazi';
    protected $guarded = [];


    public function path(){
        return "/yazi/{$this->id}";
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }
}
