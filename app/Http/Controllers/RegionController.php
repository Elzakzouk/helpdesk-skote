<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role_or_permission:superadmin|region-list|region-create|region-edit|region-delete', ['only' => ['index','store']]);
    //     $this->middleware('role_or_permission:superadmin|region-create', ['only' => ['create','store']]);
    //     $this->middleware('role_or_permission:superadmin|region-edit', ['only' => ['edit','update']]);
    //     $this->middleware('role_or_permission:superadmin|region-delete', ['only' => ['destroy']]);
    //     $this->middleware('role_or_permission:superadmin|region-force-delete', ['only' => ['forceDelete']]);
    //     $this->middleware('role_or_permission:superadmin|region-restore', ['only' => ['restore']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::withTrashed()->get();
        
        return view('region.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required|unique:regions,name|max:191',
            'name_ar' => 'required|unique:regions,name_ar|max:191'
        ]);

        Region::create($data);

        return redirect()->route('regions.index')->with('success','Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        return view('region.show',compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('region.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Region $region)
    {
        $data = $request->validate([
            'name' => 'required|max:191|unique:regions,name,'.$region->id,
            'name_ar' => 'required|max:191|unique:regions,name_ar,'.$region->id
        ]);
        
        $region->update($data);

        return redirect()->route('regions.index')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->back()->with('success','Deleted successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $region = Region::onlyTrashed()->findOrFail($id);
        $region->restore();

        return redirect()->back()->with('success','Deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $region = Region::onlyTrashed()->findOrFail($id);
        $region->forceDelete();

        return redirect()->back()->with('success','Deleted successfully');
    }
}
