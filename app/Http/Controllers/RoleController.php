<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.roles.index',['roles'=>Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.roles.create');
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
            'name'=>['string','max:255','required']
        ]);
        Role::create($input);
        session()->flash('message','Role has been successfuly created.');
        session()->flash('alert-class','alert-success');
        return redirect()->route('roles.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('admin.roles.show',['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admin.roles.edit',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $input=$request->validate([
            'name'=>['string','max:255','required']
        ]);

        $role->name=$input['name'];
        
        if ($role->isDirty()) {
            $role->update();
        session()->flash('message','Role has been successfuly updated.');
        session()->flash('alert-class','alert-success');
        }else{
            session()->flash('message','You have not made any changes to your role.');
          
        }
        
        return redirect()->route('roles.edit',['role'=>$role]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        session()->flash('message','Role has been successfuly deleted.');
        session()->flash('alert-class','alert-success');
        return redirect()->route('roles.index');
    }
}
