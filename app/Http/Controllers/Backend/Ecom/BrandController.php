<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Brand";
        $list_page = "Brands";
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('backend.ecom.brand.index', compact('brands', 'title', 'list_page'));
    }

    // trash item list
    public function trash()
    {
        $title = "Brand";
        $list_page = "Brands";
        $brands = Brand::onlyTrashed()->get();
        return view('backend.ecom.brand.trash', compact('title', 'list_page', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Brand";
        $list_page = "Brands";
        return view('backend.ecom.brand.create', compact('title', 'list_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'slug' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'brands');
        }
        // return $data;

        Brand::create($data);
        return redirect()->route('admin.brand.index')->with('success', 'Brand has been created successfully');
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
        $title = "Brand";
        $list_page = "Brands";
        $brand = Brand::findOrFail(intval($id));
        return view('backend.ecom.brand.edit', compact('title', 'list_page', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail(intval($id));

        if ($request->slug) {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255|unique:brands',
                'slug' => 'required|string|max:255',
            ]);
        }

        $data = $request->all();


        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'brands', $brand->image);
        }

        $brand->update($data);
        return redirect()->route('admin.brand.index')->with('success', 'Brand has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail(intval($id));
        $brand->delete();
        return redirect()->route('admin.brand.index')->with('success', 'Brand has been deleted successfully');
    }

    // restore
    public function restore($id)
    {
        $brand = Brand::withTrashed()->findOrFail(intval($id));

        $brand->restore();
        return redirect()->route('admin.brand.index')->with('success', 'Brand has been restored successfully');
    }


    // force delete
    public function forceDelete($id)
    {
        $brand = Brand::withTrashed()->findOrFail(intval($id));
        FileUploadHelper::delete($brand->image);
        $brand->forceDelete();

        return redirect()->route('admin.brand.trash')->with('success', 'Brand has been deleted permanently');
    }
}
