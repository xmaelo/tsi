<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model 
{
	protected $fillable = [ 
        'article_id', 'tag', 
    ];
    protected $guarded=['id', 'created_at'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
