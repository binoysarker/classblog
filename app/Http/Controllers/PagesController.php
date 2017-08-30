<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
    	return view('pages.index');
    }
    public function getAbout()
    {
    	return view('pages/about');
    }
    public function getContact()
    {
    	return view('pages/contact');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPosts()
    {
        $posts = Post::all();
        return view('pages.admin.allPosts',compact('posts'));
    }
    public function getComments(){
        $comments = Comment::all();
        return view('pages.admin.allComments',compact('comments'));
    }


}
