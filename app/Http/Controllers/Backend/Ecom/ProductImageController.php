<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title = "Product Image";
        $list_page = "Product Images";
        $product = Product::findOrFail(intval($id));
        $images = ProductImage::where('product_id', $product->id)->get();
        return view('backend.ecom.product.image.index', compact('title', 'list_page', 'images', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $title = "Product Image";
        $list_page = "Product Images";
        $product = Product::findOrFail(intval($id));
        return view('backend.ecom.product.image.create', compact('title', 'list_page', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail(intval($request->product_id));
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'products');
        }
        ProductImage::create($data);

        return redirect()->route('admin.product-image.index', $product->id)->with('success', 'Product Image has been created successfully');
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
        $title = "Product Image";
        $list_page = "Product Images";
        $image = ProductImage::findOrFail(intval($id));
        $product = Product::findOrFail(intval($image->product_id));
        return view('backend.ecom.product.image.edit', compact('title', 'list_page', 'image', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = ProductImage::findOrFail(intval($id));
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'products');
        }
        $image->update($data);

        $product = Product::findOrFail(intval($image->product_id));
        return redirect()->route('admin.product-image.index', $product->id)->with('success', 'Product Image has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = ProductImage::findOrFail(intval($id));
        $product = Product::findOrFail(intval($image->product_id));
        if (Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }
        $image->forceDelete();

        return redirect()->route('admin.product-image.index', $product->id)->with('success', 'Product Image has been deleted successfully');
    }
}
