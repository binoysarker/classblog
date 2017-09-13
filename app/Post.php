<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['PostTitle','PostBody'];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as year,monthname(created_at) as month,COUNT(*) as published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
