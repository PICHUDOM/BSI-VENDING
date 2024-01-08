<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Machines;
use App\Models\Product;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_ca = Product::all();
        $machin = Machines::all();
        $data = Slot::all();
        // dd($data);
        return view('contents/slot', compact('data', 'machin', 'product_ca'));
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
        // Validate the request data
        $validatedData = $request->validate([
            'quantity' => 'required|array',
            'id_ven_machines' => 'required|int',
            'product_id' => 'required|array',
        ]);

        // Assuming both arrays have the same length
        $quantityArray = $validatedData['quantity'];
        $productIdsArray = $validatedData['product_id'];

        // Create the slot record
        $slotData = [
            'id_ven_machines' => $validatedData['id_ven_machines'],

        ];
        $slot = Slot::create($slotData);

        foreach ($productIdsArray as $index => $productId) {
            // Check if the productId is empty, and set quantity to null in that case
            $quantity = $productId === '' ? null : $quantityArray[$index];

            $invenData = [
                'QTY' => $quantity,
                'product_id' => $productId,
                'slot_id' => $slot->id, // Associate the inventory record with the slot
            ];

            Inventory::create($invenData);
        }

        return redirect()->back()->with('success', 'Slot data has been saved successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
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
