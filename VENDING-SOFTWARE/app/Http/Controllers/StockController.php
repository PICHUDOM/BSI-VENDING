<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Stockproduct;
use App\Models\Supp;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    //     $data = Stock::all();
    //     $results = DB::table('tab_pro_slot')
    //         ->select('pro_id', 'ware_id', DB::raw('SUM(to_refill) AS total_refill'))
    //         ->groupBy('pro_id', 'ware_id')
    //         ->havingRaw('total_refill IS NOT NULL')
    //         ->get();
    //     dd($results);
    //     foreach ($data as $stock) {
    //         $proId = $stock->pro_id;
    //         $totalqty = json_decode($stock->totalqty, true) ?? [];
    //         if (isset($results[$proId])) {
    //             $totalRefill = $results[$proId]->total_refill;
    //             // Subtract total_refill from existing totalqty
    //             $totalqty[] = -$totalRefill;
    //             $stock->totalqty = json_encode($totalqty);
    //             $stock->save();
    //         }
    //     }

    //     return view('contents/stock-list', compact('data'));
    // }
    public function index()
    {
        // Fetch all stock data
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
        $ware = Warehouse::all();
        return view('contents/create/create_stock', compact('stock', 'supp_data', 'pro_data', 'ware'));
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
        ]);

        // Prepare array of objects for qty, price, subtotal, and uom
        $qtyArray = [];
        $priceArray = [];
        $subtotalArray = [];
        $uomArray = [];
        $totalqtyArray = [];

        foreach ($validatedData['qty'] as $key => $qty) {
            $qtyArray[] = ['qty' => $qty];
            $priceArray[] = ['price' => $validatedData['price'][$key]];
            $subtotalArray[] = ['subtotal' => $validatedData['subtotal'][$key]];
            $uomArray[] = ['uom' => $validatedData['uom'][$key]];

            // Calculate totalqty
            // $totalqty[$key] = (float)$validatedData['subtotal'][$key] * (int)$qty;
            $totalqtyArray[] = ['totalqty' => (float)$validatedData['subtotal'][$key] * (int)$qty];
        }

        // Convert arrays to JSON before assigning to model properties
        $validatedData['pro_id'] = json_encode($validatedData['pro_id']);
        $validatedData['qty'] = json_encode($qtyArray);
        $validatedData['price'] = json_encode($priceArray);
        $validatedData['subtotal'] = json_encode($subtotalArray);
        $validatedData['uom'] = json_encode($uomArray);
        $validatedData['totalqty'] = json_encode($totalqtyArray);

        // Save the stock data
        $stock = new Stock();
        $stock->fill($validatedData);
        $stock->save();

        // Save stock product data
        $proIds = json_decode($validatedData['pro_id'], true);
        foreach ($proIds as $key => $pro_id) {
            $stockpro = new Stockproduct();
            $stockpro->ware_id = $validatedData['ware_id'];
            $stockpro->pro_id = $pro_id;

            // Access the 'totalqty' property within the object
            $stockpro->totalqty = $totalqtyArray[$key]['totalqty']; // Use the correct key

            $stockpro->save();
        }
        return redirect('/stock-list')->with('success', 'Stock data has been saved successfully.');
    }


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

        $stock = Stock::findOrFail($id);

        $proIdArray = json_decode($stock->pro_id, true) ?? [];
        $qtyArray = json_decode($stock->qty, true) ?? [];
        $priceArray = json_decode($stock->price, true) ?? [];
        $subtotalArray = json_decode($stock->subtotal, true) ?? [];
        $uomArray = json_decode($stock->uom, true) ?? [];
        $totalqtyArray = json_decode($stock->totalqty, true) ?? [];


        foreach ($validatedData['pro_id'] as $key => $pro_id) {
            // Check if the product ID already exists in proIdArray
            if (in_array($pro_id, $proIdArray)) {
                $index = array_search($pro_id, $proIdArray);
                // Add old quantity and new quantity to qtyArray
                $oldQty = $qtyArray[$index]['qty'] ?? 0;
                $qtyArray[$index]['qty'] = [$oldQty, $validatedData['qty'][$key]];
                $price = $priceArray[$index]['price'] ?? 0;
                $priceArray[$index]['price'] = [$price, $validatedData['price'][$key]];
                $oldsubtotalArray = $subtotalArray[$index]['subtotal'] ?? 0;
                $subtotalArray[$index]['subtotal'] = [$oldsubtotalArray, $validatedData['subtotal'][$key]];
                $oldQtyuomArray = $uomArray[$index]['uom'] ?? 0;
                $uomArray[$index]['uom'] = [$oldQtyuomArray, $validatedData['uom'][$key]];
                $oldTotalQty = $totalqtyArray[$index]['totalqty'] ?? 0;
                $newTotalQty = (float)$validatedData['subtotal'][$key] * (int)$validatedData['qty'][$key];
                $totalqtyArray[$index]['totalqty'] = [$oldTotalQty, $newTotalQty];
            } else {
                // If the product does not exist, add it
                $proIdArray[] = $pro_id;
                $qtyArray[] = ['qty' => [$validatedData['qty'][$key]]];
                $priceArray[] = $validatedData['price'][$key];
                $subtotalArray[] = $validatedData['subtotal'][$key];
                $uomArray[] = $validatedData['uom'][$key];
                $totalqtyArray[] = ['totalqty' => [(float)$validatedData['subtotal'][$key] * (int)$validatedData['qty'][$key]]];
            }
        }
        // Re-encode arrays and update the stock object
        $stock->pro_id = json_encode($proIdArray);
        $stock->qty = json_encode($qtyArray);
        $stock->price = json_encode($priceArray);
        $stock->subtotal = json_encode($subtotalArray);
        $stock->uom = json_encode($uomArray);
        $stock->totalqty = json_encode($totalqtyArray);
        // $stock->save();
        // $ware_id = $stock->ware_id;

        // foreach ($validatedData['pro_id'] as $key => $pro_id) {
        //     $stockpro = Stockproduct::firstOrNew(['pro_id' => $pro_id]);
        //     $stockpro->ware_id = $ware_id;
        //     $stockpro->pro_id = $pro_id;
        //     $oldTotalQty = $stockpro->totalqty ?? 0;
        //     $newTotalQty = $oldTotalQty + $totalqtyArray[$key]['totalqty'];
        //     $stockpro->totalqty = $newTotalQty;
        //     $stockpro->save();
        // }
        $ware_id = $stock->ware_id;

        foreach ($validatedData['pro_id'] as $key => $pro_id) {
            $stockpro = Stockproduct::firstOrNew(['pro_id' => $pro_id]);
            $stockpro->ware_id = $ware_id;
            $stockpro->pro_id = $pro_id;
            // Access the updated total quantity from $totalqtyArray directly
            $newTotalQty = $totalqtyArray[$key]['totalqty'][1];
            dd($newTotalQty);
            // If the product already exists in Stockproduct, add to the existing quantity
            $stockpro->totalqty = ($stockpro->totalqty ?? 0) + (int)$newTotalQty;
            $stockpro->save();
        }
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
