<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Warehouse::all();
        return view('contents/warehouse', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ware = Warehouse::all();
        return view('contents/create/create_warehouse', compact('ware'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'warehouse_name' => 'required|string',
            'province' => 'required|string',
            'districts' => 'required|string',
            'communes' => 'required|string',
            'villages' => 'required|string',

        ], [
            'warehouse_name.required' => 'Please input supp',
            'province.required' => 'Please select province',
            'districts.required' => 'Please select districts',
            'communes.required' => 'Please select communes',
            'villages.required' => 'Please select villages',

        ]);

        Warehouse::create($validatedData);

        return redirect('/warehouse')->with('success', 'Supp data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    // Assuming $id is the warehouse ID from the URL
    // Retrieve the last record ID from the URL
    $lastId = (int) $id;

    // Query the database to get only the records where 'wear_id' equals the last ID
    $data = Stock::where('ware_id', $lastId)->get();

    // Pass the filtered data to the view
    return view('contents/warehouse-list', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
