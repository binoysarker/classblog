<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


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
        $archives = Post::archives();
//      to get the latest posts render to the view
        $posts = Post::latest();

        if ($month = request('month')){
            $posts->whereMonth('created_at',Carbon::parse($month)->month);
        }
        if ($year = request('month')){
            $posts->whereYear('created_at',Carbon::parse($year)->year);
        }
        $posts = $posts->get();

        return view('posts.index',compact('posts','archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'PostTitle' =>  'required|max:10',
            'PostBody' =>  'required'
            ]);


        Post::create(request(['PostTitle','PostBody']));
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
