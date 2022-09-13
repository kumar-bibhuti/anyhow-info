<?php

namespace App\Http\Controllers;
use\App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','s-manager-access']);
    }
    public function index()
    {
        $users = Users::all();
         return view('user.index',compact('users'));
    }

    public function create()
    {
        $users = users::all();
        return view('user.create',compact('users'));
    }

    public function edit($id)
    {
        $users = Users::find($id);
        return view('user.create',compact('users'));
    }

    public function store(Request $request)
    {
        $users=Users::create($request->all());
        if( $users){
			return redirect()->route('user.index')->with('success', 'Added successfully');
        }
        else{
            return redirect()->route('user.create')->with('error', 'Not added');
        }
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            // 'name' => 'required',
            // 'assigned' => 'required',
            
        ]);
        $users = Users::find($id)->update($request->all());
        
        return redirect()->route('user.index')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $users = Users::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}