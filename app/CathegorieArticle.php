<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CathegorieArticle extends Model
{
    protected $fillable = [ 
        'article_id', 'cathegorie_id',
    ];
    protected $guarded=['created_at'];
}
