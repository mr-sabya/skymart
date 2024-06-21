<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Attribute as ModelsAttribute;
use App\Models\AttributeItem;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, Request $request)
    {
        $title = "Variations";
        $list_page = "Variations";
        $product = Product::findOrFail(intval($id));
        return view('backend.ecom.product.variants.index', compact('title', 'list_page', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request)
    {
        $attribute = ModelsAttribute::findOrFail(intval($request->attribute));
        $title = $attribute->name;
        $list_page = "Variations";
        $product = Product::findOrFail(intval($id));
        $items = AttributeItem::where('attribute_id', $attribute->id)->get();
        return view('backend.ecom.product.variants.create', compact('title', 'list_page', 'product', 'attribute', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail(intval($request->product_id));
        $request->validate([
            'attribute_item_id' => 'required',
            'sku' => 'nullable|string|max:255|unique:product_variations',
        ]);

        $data = $request->all();
        ProductVariation::create($data);
        return redirect()->route('admin.product-variant.index', $product->id)->with('success', 'Product variation has beed added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $variant = ProductVariation::findOrFail(intval($id));
        $attribute = ModelsAttribute::findOrFail(intval($variant->attribute_id));

        $title = $attribute->name;
        $list_page = "Variations";
        $items = AttributeItem::where('attribute_id', $attribute->id)->get();
        $product = Product::findOrFail(intval($variant->product_id));


        return view('backend.ecom.product.variants.edit', compact('title', 'list_page', 'product', 'attribute', 'items', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $variant = ProductVariation::findOrFail(intval($id));
        $product = Product::findOrFail(intval($variant->product_id));

        if ($request->sku == $variant->sku) {
            $request->validate([
                'attribute_item_id' => 'required',
                'sku' => 'nullable|string|max:255',
            ]);
        } else {
            $request->validate([
                'attribute_item_id' => 'required',
                'sku' => 'nullable|string|max:255|unique:product_variations',
            ]);
        }

        $data = $request->all();
        $variant->update($data);

        return redirect()->route('admin.product-variant.index', $product->id)->with('success', 'Product variation has beed updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariation::findOrFail(intval($id));
        $product = Product::findOrFail(intval($variant->product_id));

        $variant->forceDelete();
        
        return redirect()->route('admin.product-variant.index', $product->id)->with('success', 'Product variation has beed deleted successfully');
    }
}
