<?php

namespace App\Http\Controllers;

use App\Models\Income_category;
use Illuminate\Http\Request;

class Income_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Income_category::all();
        return view('contents/inco_category', compact('data'));
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
        $validatedData = $request->validate([
            'type' => 'required|string',
            'price' => 'required|string',
        ],[
            'type.required'=>'Please inpute Type',
            'price.required'=>'Please inpute Price'
        ]);

        Income_category::create($validatedData);

        return redirect()->back()->with('success', 'Machine data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income_category  $income_category
     * @return \Illuminate\Http\Response
     */
    public function show(Income_category $income_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income_category  $income_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Income_category $income_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income_category  $income_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income_category $income_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income_category  $income_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income_category $income_category,$id)
    {
        //
        Income_category::destroy($id);
        return redirect('inco_category')->with('flash_message', 'Data deleted!');
    }
}
