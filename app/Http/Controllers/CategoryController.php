<?php

namespace App\Http\Controllers;

use App\Category;
use App\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        return view('admin.categories.index',['categories'=>Category::all()]);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('admin.categories.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
        $input=$request->validate([
            'name'=>['required','string','max:255'],
            'description'=>['required','max:1000'],
            'img'=>['required','mimes:png,jpg']
            ]);
            
            $img=$request->file('img');   
            $img->store('images/categories','public');
            $input['img']='storage/images/categories/'.$img->hashName();
            Category::create($input);
            Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->select('id')->where('slug','created_category')->first()]);
            session()->flash('message','Category has been successfuly created!');
            session()->flash('alert-class','alert-success');
            return redirect()->route('categories.index');
            
            
        }
        
        /**
        * Display the specified resource.
        *
        * @param  \App\Category  $category
        * @return \Illuminate\Http\Response
        */
        public function show(Category $category)
        {
            //
            return view('admin.categories.show',['category'=>$category]);
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Category  $category
        * @return \Illuminate\Http\Response
        */
        public function edit(Category $category)
        {
            //
            return view('admin.categories.edit',['category'=>$category]);
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Category  $category
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, Category $category)
        {
            //
            //dd($category);
            $input=$request->validate([
                'name'=>['required','string','max:255'],
                'description'=>['required','max:1000'],
                'img'=>['sometimes','mimes:png,jpg']
                ]);
                
                if($request->file('img')!=null){
                    $img=$request->file('img');
                    $img->store('images/categories','public');
                    $input['img']='storage/images/categories/'.$img->hashName();
                    $category->img=$input['img'];
                }

               
                $category->name=$input['name'];
                $category->description=$input['description'];
                if($category->isDirty()){ 
                   $category->update();
                   Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->select('id')->where('slug','updated_category')->first()]);
                    session()->flash('message','Category has been successfuly updated!');
                    session()->flash('alert-class','alert-success');
                    
                }else{
                    session()->flash('message','You didnot change anything!');
                }

                return redirect()->route('categories.edit',$category);
                
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  \App\Category  $category
            * @return \Illuminate\Http\Response
            */
            public function destroy(Category $category)
            {
                //
                $category->delete();
                Log::create(['user_id'=>auth()->user()->id,'logs_type_id'=>DB::table('logs_types')->select('id')->where('slug','deleted_category')->first()]);
                session()->flash('message','A category has been successfuly deleted!');
                session()->flash('alert-class','alert-success');
                return redirect()->route('categories.index');
            }
        }
        