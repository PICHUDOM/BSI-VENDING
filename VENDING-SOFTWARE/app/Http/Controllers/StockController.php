<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Supp;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Stock::all();
        return view('contents/stock-list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = Stock::all();
        $supp_data = Supp::all();
        $pro_data = Product::all();
        $ware=Warehouse::all();
        return view('contents/create/create_stock', compact('stock', 'supp_data', 'pro_data','ware'));
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
            'supp_id' => 'required|int',
            'ware_id' => 'required|int',
            'received_date' => 'required|date',
            'source' => 'required|string',
            'pro_id' => 'required|array',
            'qty' => 'required|array',
            'price' => 'required|array',
            'subtotal' => 'required|array',
            'uom' => 'required|array',
            'pro_id.*' => 'required|int',
            'qty.*' => 'required|int',
            'price.*' => 'required|numeric',
            'subtotal.*' => 'required|numeric',
            'uom.*' => 'required|string',
            
        ]);

        // Convert arrays to JSON before assigning to model properties
        $validatedData['pro_id'] = json_encode($validatedData['pro_id']);
        $validatedData['qty'] = json_encode($validatedData['qty']);
        $validatedData['price'] = json_encode($validatedData['price']);
        $validatedData['subtotal'] = json_encode($validatedData['subtotal']);
        $validatedData['uom'] = json_encode($validatedData['uom']);
        $stock = new Stock();
        $stock->fill($validatedData);
        $stock->save();
        return redirect('/stock-list')->with('success', 'Stock data has been saved successfully.');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'supp_id' => 'required|int',
    //         'ware_id' => 'required|int',
    //         'received_date' => 'required|date',
    //         'source' => 'required|string',
    //         'pro_id' => 'required|array',
    //         'qty' => 'required|array',
    //         'price' => 'required|array',
    //         'subtotal' => 'required|array',
    //         'uom' => 'required|array',
    //         'pro_id.*' => 'required|int',
    //         'qty.*' => 'required|int',
    //         'price.*' => 'required|numeric',
    //         'subtotal.*' => 'required|numeric',
    //         'uom.*' => 'required|string',
    //     ]);
    
    //     // Calculate totalqty based on subtotal and qty
    //     $totalqty = [];
    //     foreach ($validatedData['subtotal'] as $key => $subtotal) {
    //         $totalqty[$key] = $subtotal * $validatedData['qty'][$key];
    //     }
    
    //     // Assign totalqty to validatedData
    //     $validatedData['totalqty'] = $totalqty;

    //     // Convert arrays to JSON before assigning to model properties
    //     $validatedData['pro_id'] = json_encode($validatedData['pro_id']);
    //     $validatedData['qty'] = json_encode($validatedData['qty']);
    //     $validatedData['price'] = json_encode($validatedData['price']);
    //     $validatedData['subtotal'] = json_encode($validatedData['subtotal']);
    //     $validatedData['uom'] = json_encode($validatedData['uom']);
    //     $validatedData['totalqty'] = json_encode($validatedData['totalqty']);
    
    //     $stock = new Stock();
    //     $stock->fill($validatedData);
    //     dd($stock);
    //     $stock->save();
        
    //     return redirect('/stock-list')->with('success', 'Stock data has been saved successfully.');
    // }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock   $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supp_data = Supp::all();
        $pro_data = Product::all();
        $data = Stock::findOrFail($id);

        return view('contents/update/edit_stock', compact('data', 'supp_data', 'pro_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pro_id' => 'required|array',
            'qty' => 'required|array',
            'price' => 'required|array',
            'subtotal' => 'required|array',
            'uom' => 'required|array',

        ]);

        // Fetch the existing Stock instance from the database
        $stock = Stock::findOrFail($id);
        // Update JSON arrays with the validated data
        $stock->pro_id = json_encode($validatedData['pro_id']);
        $stock->qty = json_encode($validatedData['qty']);
        $stock->price = json_encode($validatedData['price']);
        $stock->subtotal = json_encode($validatedData['subtotal']);
        $stock->uom = json_encode($validatedData['uom']);
        $stock->save();

        return redirect('/stock-list')->with('success', 'Stock data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
