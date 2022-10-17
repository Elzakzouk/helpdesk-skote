<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

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
        $regions = Region::all();

        return view('city.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
