<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::categories();
        $archives = Post::archives();
//      to get the latest posts render to the view
        $posts = Post::where('user_id',auth()->user()->id)->latest();

        switch (request()){
            case 'month':
                $month = request('month');
                $posts->whereMonth('created_at',Carbon::parse($month)->month);
                break;
            case 'year':
                $year = request('year');
                $posts->whereYear('created_at',Carbon::parse($year)->year);
                break;
            case 'CategoryName':
                $categories = Category::where('user_id',auth()->user()->id)->get();
                break;


        }


        $posts = $posts->get();


        return view('posts.index',compact('posts','archives','categories'));
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
            'PostTitle' =>  'required|max:55',
            'PostBody' =>  'required'
            ]);
//        validation for Category
        $this->validate($request,[
            'CategoryName'  =>  'required|max:55',
            'CategoryPublished'  =>  'numeric'
        ]);

        if (isset($request->PostTitle)){
            Post::create(request(['PostTitle','PostBody','user_id']));

        }


        if (isset($request->CategoryName)){

//      store data of the category in the Category table
            Category::create(request(['CategoryName','user_id']));

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
