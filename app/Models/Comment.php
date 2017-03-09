<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'name',
        'email',
        'content',
    ];
    
    public function post(){
        $this->belongsTo('\App\Models\Post');
    }
}
