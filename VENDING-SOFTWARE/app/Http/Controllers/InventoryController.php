<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Machines;
use App\Models\Product;
use App\Models\Reslot;
use App\Models\SaleDetail;
use App\Models\Slot;
use App\Models\Stock;
use App\Models\Warehouse;
use App\Repositories\Dashboard\HomeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $homeRepository;

    public function index(Request $request, Inventory $dataSyncService)
    {

        $syncedDataApi = $dataSyncService->syncDataFromApi();
        $saledetail = SaleDetail::all();
        $data = Inventory::all();
        $syncedData = Reslot::all();
        $wareData = Stock::with('warehouse')->get();
        // $proIds = $data->pluck('pro_id')->unique()->toArray(); // Get unique product IDs from inventory

        // $wareData = Stock::where(function ($query) use ($proIds) {
        //     foreach ($proIds as $proId) {
        //         $query->orWhereJsonContains('pro_id', (string) $proId);
        //     }
        // })
        //     ->with('warehouse')
        //     ->get();
        // dd($wareData);
        return view('contents/inventory', compact('data', 'saledetail', 'syncedData', 'syncedDataApi', 'wareData'));
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
        $product_ca = Product::all();
        $machin = Machines::all();
        $data = Slot::all();
        $producData = Inventory::findOrFail($id);
        return view('contents/update/edit_inventoryproduct', compact('data', 'machin', 'product_ca', 'producData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $dataSyncService)
    {
        $syncedData = $dataSyncService->syncDataFromApi();
        Inventory::updateInventory($request->input('inventory_id'), $request->input('to_refill'), $syncedData);
        return redirect('inventory')->with('flash_message', 'Refill quantities updated successfully.');
    }
    public function updateInventory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pro_id' => 'required|int',

        ], [
            'pro_id.required' => 'Please select Product Name',
        ]);

        // Find the product by ID
        $product = Inventory::find($id);
        // $product->specific_code = $validatedData['specific_code'];
        $product->pro_id = $validatedData['pro_id'];

        $product->update();

        return redirect('/inventory')->with('flash_message', 'Incomelist Updated Successfully');
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
