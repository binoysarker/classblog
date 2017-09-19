<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $category;
    public function __construct()
    {
        $this->category = new Category;
        $this->middleware('auth:admin');
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

    public function index()
    {
        $categories = $this->category->all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'user_id'           =>  'required|numeric',
            'CategoryName'      =>  'required|max:55',
            'CategoryPublished' =>  'required|numeric',
            'CategoryDescription'   =>  'required'
        ]);
        $this->category->user_id = \auth()->user()->id;
        $this->category->CategoryName = $request->CategoryName;
        $this->category->CategoryPublished = $request->CategoryPublished;
        $this->category->CategoryDescription = $request->CategoryDescription;
        $this->category->save();
        session()->flash('message','Data Inserted Successfuly');
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('category.edit',compact('category'));
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
            'user_id'           =>  'required|numeric',
            'CategoryName'      =>  'required|max:55',
            'CategoryPublished' =>  'required|numeric',
            'CategoryDescription'   =>  'required'
        ]);

        $category = $this->category->find($id);
        $category->update(\request(['user_id','CategoryName','CategoryPublished','CategoryDescription']));
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = $this->category->find($id);
        $categories->delete();
        session()->flash('message','Data Deleted Successfuly');
        return redirect()->back();
    }
}
