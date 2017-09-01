<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public $posts;
    public $comments;
    public function __construct()
    {
        $this->posts = new Post();
        $this->comments = new Comment();
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->comments->all();
        $posts = $this->posts->all();
        return view('admin.index',compact('posts','comments'));
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPosts()
    {
        $posts = $this->posts->all();
        return view('pages.admin.allPosts',compact('posts'));
    }
    public function getComments(){
        $comments = $this->comments->all();
        return view('pages.admin.allComments',compact('comments'));
    }

    /*
     * This part is for AdminController create,edit,update,delete
     * */



    /*
     * show the form to create post for admin
     * */
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required|max:10',
            'body' =>  'required'
        ]);

        $this->posts->create(request(['title','body']));
        session()->flash('message','Data Stored Successfuly');
        return redirect('/admin');
    }

    public function show(Post $post)
    {
        return view('admin.show',compact('post'));
    }
    /*
     * to edit post for admin show a form
     * */
    public function edit($id)
    {
        $post = $this->posts->find($id);
        return view('admin.edit',compact('post'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' =>  'required|max:10',
            'body' =>  'required'
        ]);
        $this->posts->find($id);
        $this->posts->update(request(['title','body']));
        session()->flash('message','Data Updated Successfuly');
        return redirect('/admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        session()->flash('message','Data Deleted Successfuly');
        return redirect('/admin');
    }
}
