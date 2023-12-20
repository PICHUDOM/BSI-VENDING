<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Districts;
use Illuminate\Http\Request;


class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = Districts::ByDistrict(12)->get();
        // $machinesByDistrict = Districts::ByDistrict();
        return view('welcome', compact('districts'));
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
     * @param  \App\Models\Distrcts  $distrcts
     * @return \Illuminate\Http\Response
     */
    public function show(Districts $distrcts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distrcts  $distrcts
     * @return \Illuminate\Http\Response
     */
    public function edit(Districts $distrcts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distrcts  $distrcts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Districts $distrcts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distrcts  $distrcts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Districts $distrcts)
    {
        //
    }
}
