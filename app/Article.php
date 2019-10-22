<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [ 
        'title', 'content', 'image', 'visited', 'pined'
    ];
    protected $guarded=['id', 'created_at']; 
	

    public function cathegories()
    {
        return $this->belongsToMany(Cathegorie::class, 'cathegorie_article');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
