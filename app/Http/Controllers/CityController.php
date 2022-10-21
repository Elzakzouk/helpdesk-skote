<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('role_or_permission:superadmin|city-list|city-create|city-edit|city-delete', ['only' => ['index','store']]);
    //     $this->middleware('role_or_permission:superadmin|city-create', ['only' => ['create','store']]);
    //     $this->middleware('role_or_permission:superadmin|city-edit', ['only' => ['edit','update']]);
    //     $this->middleware('role_or_permission:superadmin|city-delete', ['only' => ['destroy']]);
    //     $this->middleware('role_or_permission:superadmin|city-force-delete', ['only' => ['forceDelete']]);
    //     $this->middleware('role_or_permission:superadmin|city-restore', ['only' => ['restore']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cities = City::withTrashed()->get();
        
      return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
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
            'name' => 'required|max:191|unique:cities,name',
            'name_ar' => 'required|max:191|unique:cities,name_ar',
            'main' => 'nullable|boolean'
        ]);

          $city=new City();
          if($request->input('main')==0)
          {
            $city->main=0;
          }
          else
          {
            $city->main=1;
          }
          //dd($city->main);  
        
         $city->name = $request->input('name');
          $city->name_ar = $request->input('name_ar');
      
          $city->Save();
          return redirect()->back()->with('success','Created successfully');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
      return view('city.show',compact('city')); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    { 

      return view('city.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,City $city)
    {  
      $data = $request->validate([
        'name' => 'required|max:191|unique:cities,name,'.$city->id,
        'name_ar' => 'required|max:191|unique:cities,name_ar,'.$city->id,
        'main' => 'nullable|boolean'
    ]); 
 
  
       $city->update($data);
      
      return redirect()->route('cities.index')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
    
    $city->delete();
     
    return redirect()->back()->with('delete','Deleted successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $city=City::onlyTrashed()->findOrFail($id);
        $city->forcedelete();
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
        $city=City::onlyTrashed()->findOrFail($id);
        $city->restore();
        return back();
    }
}
