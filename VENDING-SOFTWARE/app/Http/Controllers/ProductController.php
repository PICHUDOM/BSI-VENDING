<?php

namespace App\Http\Controllers;

use App\Models\Pro_category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Pro_category::all();
        $data = Product::all();
        return view('contents/product', compact('data', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Pro_category::all();
        $data = Product::all();
        return view('contents/create/create_product', compact('data', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'm_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'p_name' => 'required|string',
                'expiry_date' => 'required|date',
                'specific_code' => 'required|string',
                'id_pro_categories' => 'required|int',
            ],
            [
                'p_name.required' => 'Please input Product name',
                'expiry_date.required' => 'Please input Expired Date',
                'specific_code.required' => 'Please input Specific code',
            ]
        );
        if ($request->hasFile('p_image')) {
            $image = $request->file('p_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $validatedData['p_image'] = 'images/' . $imageName; // Store the path relative to the public directory
        }
        Product::create($validatedData);

        return redirect('products')->with('flash_message', 'Incom Category Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        //
        $data = Product::findOrFail($id);
        return view('contents/update/edit_product', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'p_name' => 'required|string',
            'expiry_date' => 'required|date',
            'specific_code' => 'required|string',
        ], [
            'p_name.required' => 'Please input Product Name',
            'expiry_date.required' => 'Please input Expiry Date',
            'specific_code.required' => 'Please input Specific Code',
        ]);

        // Find the product by ID
        $product = Product::find($id);

        $product->p_name = $validatedData['p_name'];
        $product->expiry_date = $validatedData['expiry_date'];
        $product->specific_code = $validatedData['specific_code'];
        $product->update();

        return redirect('/products')->with('flash_message', 'Product Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products')->with('flash_message', 'Product deleted!');
    }
}
