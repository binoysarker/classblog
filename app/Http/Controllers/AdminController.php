<?php

namespace App\Http\Controllers;

use App\Category;
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
    public $category;
    public function __construct()
    {
        $this->posts = new Post;
        $this->comments = new Comment;
        $this->category = new Category;
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
        $comments = $this->comments->orderBy('post_id')->get();
        $posts = $this->posts->all();
        return view('pages.admin.allComments',compact('comments','posts'));
    }

    /*
     * This part is for AdminController create,edit,update,delete
     * */



    /*
     * show the form to create post for admin
     * */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create',compact('categories'));
    }

    public function store(Request $request)
    {
        if (isset($request->PostBody)){
            $this->validate($request,[
                'PostTitle' =>  'required|max:10',
                'PostBody' =>  'required',
                'category_id'       =>  'numeric',
                'user_id'       =>  'numeric'
            ]);
            $this->posts->create(request(['PostTitle','PostBody','user_id','category_id']));
            session()->flash('message','Data Stored Successfuly');
            return redirect('/admin');

        }
        if (isset($request->CategoryPublished)){
            Category::where('id',$request->category_id)->where('CategoryPublished',$request->CategoryPublished)->save();

        }
    else{
        $this->validate($request,[
            'CommentBody'   =>  'required',
            'post_id'       =>  'required|numeric'
            ]);

        $this->comments->create(\request(['CommentBody','user_id','post_id']));
        return redirect()->back();
    }

    }

    public function show($id)
    {
         $post = $this->posts->where('id',$id)->get();
        $comments = $this->comments->where('post_id',$id)->get();
//        return $post = Post::find($id)->get();
        return view('admin.show',compact('post','comments'));
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

        if (isset($request->PostBody)){
            $this->validate($request,[
                'PostTitle' =>  'required|max:10',
                'PostBody' =>  'required',
            ]);
            $post = $this->posts->find($id);
            $post->update(request(['PostTitle','PostBody']));

        }
    else{
        $this->validate($request,[
                'CommentBody' =>  'required'
            ]);
        $comments = $this->comments->find($id);
        $comments->update(request(['CommentBody','post_id']));
    }
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
        Comment::query()->where('post_id',$id)->delete();
        Comment::destroy($id);
        session()->flash('message','Data Deleted Successfuly');
        return redirect('/admin');
    }
}
