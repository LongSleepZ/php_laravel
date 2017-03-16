<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'is_feature',
        'page_view',
        'user_id',
        
    ];

    public function comments(){
        return $this->hasMany('\App\Models\Comment');
    }
    
     public function user(){
        return $this->belongsTo('\App\User');
    }
}
