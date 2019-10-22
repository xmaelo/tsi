<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cathegorie extends Model
{
	protected $fillable = [
        'title', 'description',
    ];
    protected $guarded=['id', 'created_at'];
     public function articles()
    {
        return $this->belongsToMany(Article::class, 'cathegorie_article');
    }
}
