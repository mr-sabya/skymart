<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductInfo;
use Illuminate\Http\Request;

class ProductInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title = "Product Info";
        $list_page = "Product Info";
        $product = Product::findOrFail(intval($id));
        $infos = ProductInfo::where('product_id', $product->id)->get();
        return view('backend.ecom.product.info.index', compact('title', 'list_page', 'infos', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $title = "Product Info";
        $list_page = "Product Info";
        $product = Product::findOrFail(intval($id));
        return view('backend.ecom.product.info.create', compact('title', 'list_page', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail(intval($request->product_id));

        $request->validate([
            'title.*' => 'required|string|max:255',
            'info.*' => 'required|string|max:255',
        ]);

        $title = $request->title;
        $info = $request->info;

        for ($count = 0; $count < count($title); $count++) {
            $data = array(
                'product_id' => $product->id,
                'title' => $title[$count],
                'info'  => $info[$count]
            );
            $insert_data[] = $data;
        }

        ProductInfo::insert($insert_data);
        return redirect()->route('admin.product-info.index', $product->id)->with('success', 'Product Info has been created successfully');
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
    public function edit(string $id)
    {
        $title = "Product Info";
        $list_page = "Product Info";
        $info = ProductInfo::findOrFail(intval($id));
        $product = Product::findOrFail(intval($info->product_id));
        return view('backend.ecom.product.info.edit', compact('title', 'list_page', 'product', 'info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $info = ProductInfo::findOrFail(intval($id));
        $product = Product::findOrFail(intval($info->product_id));

        $request->validate([
            'title' => 'required|string|max:255',
            'info' => 'required|string|max:255',
        ]);

        $info->update($request->all());
        return redirect()->route('admin.product-info.index', $product->id)->with('success', 'Product Info has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //forceDelete
        $info = ProductInfo::findOrFail(intval($id));
        $product = Product::findOrFail(intval($info->product_id));
        $info->forceDelete();
        return redirect()->route('admin.product-info.index', $product->id)->with('success', 'Product Info has been deleted successfully');
    }
}
