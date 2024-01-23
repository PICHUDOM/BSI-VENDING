<?php

namespace App\Http\Controllers;

use App\Models\ProducPrice;
use Illuminate\Http\Request;

class ProducPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'price_in' => 'required|array',
            'price_out' => 'required|array',
            'product_id' => 'required|array',
        ]);

        foreach ($validatedData['product_id'] as $key => $productId) {
            if ($validatedData['price_in'][$key] !== null && $validatedData['price_out'][$key] !== null) {
                ProducPrice::updateOrCreate(
                    ['product_id' => $productId],
                    [
                        'price_in' => $validatedData['price_in'][$key],
                        'price_out' => $validatedData['price_out'][$key],
                    ]
                );
            }
        }

        return redirect('products')->with('flash_message', 'Product Prices Updated Successfully');
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function show(ProducPrice $producPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProducPrice $producPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProducPrice $producPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProducPrice  $producPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProducPrice $producPrice)
    {
        //
    }
}
