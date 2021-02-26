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
        //$this->middleware('auth');
        $this->data['menu']= \DB::table('menu')->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.main.home',$this->data);
    }

    public function contact(){
        return view('pages.main.contact',$this->data);
    }

    public function login(){
        return view('pages.main.login',$this->data);
    }
    public function register(){
        return view('pages.main.register',$this->data);
    }
}
