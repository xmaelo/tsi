<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [ 
        'email'
    ];
    protected $guarded=['id', 'created_at']; 
}
