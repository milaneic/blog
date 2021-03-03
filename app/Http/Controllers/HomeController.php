<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $data;
    public function __construct()
    {
        // $this->data['menu']= \DB::table('menus')->get();
        //$this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact');
    }

    public function test()
    {
        return dd(DB::table('logs_types')->where('slug','register')->pluck('id'));
    }

    public function author(){
        return view('author');
    }
}
