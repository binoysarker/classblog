<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

class PagesController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
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
                $this->middleware('auth:admin');
                return Auth::guard('admin');
            default:
                return Auth::guard('admin');
                break;
        }
    }

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




}
