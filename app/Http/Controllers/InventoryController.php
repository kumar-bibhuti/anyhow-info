<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Users;

class InventoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $inventory = Inventory::all();
         return view('inventory.index',compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventory = Inventory::all();
        return view('inventory.create',compact('inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory=Inventory::create($request->all());
        if( $inventory){
			return redirect()->route('inventory.index')->with('success', 'Added successfully');
        }
        else{
            return redirect()->route('inventory.create')->with('error', 'Not added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventory  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.create',compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventory  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'p_id' => 'required',
            'p_name' => 'required',
            'vendor' => 'required',
            'mrp' => 'required',
            'batch_no' => 'required',
            'batch_date' => 'required',
            'qty' => 'required',
            'status' => 'required',
            
        ]);
        $inventory = Inventory::find($id)->update($request->all());
        
        return redirect()->route('inventory.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventory  $course
     * @return \Illuminate\Http\Response
     **/
    public function destroy($id)
    {
        $inventory = Inventory::find($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }



    

    
}