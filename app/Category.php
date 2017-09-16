<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['CategoryName','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
//    this method is to show the categories the sidebar
    public static function categories()
    {
        return  static ::where('user_id',auth()->user()->id)->get();
    }
}
