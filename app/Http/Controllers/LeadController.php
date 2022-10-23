<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\City;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $leads = Lead::withTrashed()->get();
        
        return view('lead.index',compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city= City::get();

        return view('lead.create',compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
            'name' => 'required|max:191|unique:leads,name',
            'code'=>'required|digits:4|unique:leads,code',
            'address' => 'required|max:300',
            'city_id'=>'required'
            
           
        ]);

        $lead=new Lead;
        $lead->city_id=$request->input('city_id');
        $lead->name = $request->input('name');
        $lead->code = $request->input('code');
        $lead->address = $request->input('address');


        $lead->save();
       
       // return redirect()->route('leads.index')->with('success','Created successfully');
        return redirect()->back()->with('success','Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $lead=Lead::find($id);
      return view ('lead.show',compact('lead'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city= City::get();
       // $city= City::findOrFail($id)->get();
        $lead=Lead::findOrFail($id);

        return view('lead.edit',compact('lead','city'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $Leads=Lead::find($id);


        $request->validate([
            'name' => 'required|max:191|unique:leads,name,'.$Leads->id,
            'code'=>'required|digits:4|unique:leads,code,'.$Leads->id,
            'address' => 'required|max:300',
            'city_id'=>'required'
            
           
        ]);


       // $Leads=Lead::find($id);
        $Leads->city_id = $request->input('city_id');
        $Leads->name = $request->input('name');
        $Leads->code = $request->input('code');
        $Leads->address = $request->input('address');
      
        $Leads->update();
    
          
          return redirect()->route('leads.index')->with('success','Updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead=Lead::find($id);
        $lead->delete();
     
        return redirect()->back()->with('delete','Deleted successfully');;
    }

    public function forceDelete($id)
    {
        $lead=Lead::onlyTrashed()->findOrFail($id);
        $lead->forcedelete();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $lead=Lead::onlyTrashed()->findOrFail($id);
        $lead->restore();
        return back();
    }
}
