<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'price',
        'file',
        'body',
    ];

    public function file(){
        return $this->belongsTo('App\Photo');
    }
}
