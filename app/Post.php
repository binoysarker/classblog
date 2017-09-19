<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['PostTitle','PostBody','user_id','category_id'];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public static function archives()
    {
        if (isset(auth()->user()->id)){
            return static::selectRaw('year(created_at) as year,monthname(created_at) as month,COUNT(*) as published')
                ->groupBy('year','month')
                ->orderByRaw('min(created_at) desc')
                ->where('user_id',auth()->user()->id)
                ->get()
                ->toArray();
        }
    }




}
