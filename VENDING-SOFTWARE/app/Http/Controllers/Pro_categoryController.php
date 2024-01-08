<?php

namespace App\Http\Controllers;

use App\Models\Pro_category;
use Illuminate\Http\Request;

class Pro_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pro_category::all();
        return view('contents/product_category', compact('data'));
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
        $validatedData = $request->validate([
            'type' => 'required|string',
        ],[
            'type.required'=>'Please inpute Type'
        ]);

        Pro_category::create($validatedData);

        return redirect()->back()->with('success', 'Machine data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pro_category  $pro_category
     * @return \Illuminate\Http\Response
     */
    public function show(Pro_category $pro_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pro_category  $pro_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Fetch the record you want to edit
        $data = Pro_category::findOrFail($id);
        return view('contents/edit_productCategory', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pro_category  $pro_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Pro_category = Pro_category::find($id);
        $Pro_category->type = $request->input('type');
        $Pro_category->update();
        return redirect('/productCategory')->with('flash_message', 'Type Update');
        // $validatedData = $request->validate([
        //     'type' => 'required|string',
        // ]);

        // // Find the record you want to update
        // $proCategory = Pro_category::findOrFail($id);

        // // Update the record with the new data
        // $proCategory->update($validatedData);

        // return redirect()->back()->with('success', 'Machine data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pro_category  $pro_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pro_category::destroy($id);
        return redirect('productCategory')->with('flash_message', 'Product categories deleted!');
    }
}
