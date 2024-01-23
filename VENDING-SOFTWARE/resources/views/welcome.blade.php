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