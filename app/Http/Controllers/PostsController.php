<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $posts;
    public function __construct()
    {
        $this->posts = new Post;
        $this->middleware('auth');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        switch (Auth::guard()){
            case 'guest':
                return Auth::guard('guest');
            break;
            case 'admin':
                return Auth::guard('admin');
            break;
            default:
                return Auth::guard();
            break;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         *set the quarry for the archives and not to make repetition of the same quarry.
         * I cut the quarry section and wrap it in the archives method and then in the appServiceProvider i make a view composer technique
         * so that when there is a section of partials.sidebar then you have to load the page
         *
         */
        $posts = new Post;
        $categories = Category::categories();
        $archives = Post::archives();
        $month = request('month');
        $year = request('year');
        $name = \request('CategoryName');
        if ($month == request('month')){
            $posts = $posts->whereMonth('created_at',Carbon::parse($month)->month)->where('user_id',\auth()->user()->id)->latest()->get();
            return view('posts.index',compact('posts','archives','categories'));
        }
        if ($year == request('year')){
            $posts = $posts->whereYear('created_at',Carbon::parse($year)->year)->where('user_id',\auth()->user()->id)->latest()->get();
            return view('posts.index',compact('posts','archives','categories'));

        }
        if ($name == \request('CategoryName')){
           $categories->where('CategoryName',$name)->where('user_id',\auth()->user()->id)->latest()->get();
           return view('posts.index',compact('posts','archives','categories'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'PostTitle' =>  'required|max:55',
            'PostBody' =>  'required',
            'category_id'  =>  'numeric',
            'user_id'  =>  'numeric'
            ]);
//        validation for Category

        if (isset($request->PostTitle)){
            Post::create(request(['PostTitle','PostBody','user_id','category_id']));

        }

        session()->flash('message','Data Inserted Successfuly');
        return redirect('/blog/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'PostTitle' =>  'required|max:10',
            'PostBody' =>  'required'
            ]);
        $post = Post::find($id);
        $post->update(request(['PostTitle','PostBody']));
        session()->flash('message','Data Updated Successfuly');
        return redirect('/blog/posts');
        
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
        return redirect('blog/posts');
    }
}
