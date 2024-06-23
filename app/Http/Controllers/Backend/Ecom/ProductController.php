<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Product";
        $list_page = "Products";

        if (request()->ajax()) {
            return datatables()->of(Product::latest()->get())
                ->addColumn('show_image', function ($data) {
                    return '<img src="' . getFileUrl($data->image) . '" style="width: 50px"/>';
                })
                ->addColumn('count_variants', function ($data) {
                    return $data->variants->count();
                })
                ->addColumn('sale_count', function ($data) {
                    return 0;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.product.edit', $data->id) . '" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-pencil-alt"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('admin.product.show', $data->id) . '" class="btn btn-info shadow btn-xs sharp me-1"><i class="fa-solid fa-eye"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="' . route('admin.product.destroy', $data->id) . '"><i class="fa-solid fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['show_image', 'count_variants', 'sale_count', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        // return Product::with('infos', 'images')->get();

        return view('backend.ecom.product.index', compact('title', 'list_page'));
    }


    // trash item list
    public function trash()
    {
        $title = "Product";
        $list_page = "Products";

        if (request()->ajax()) {
            return datatables()->of(Product::onlyTrashed()->get())
                ->addColumn('show_image', function ($data) {
                    return '<img src="' . getFileUrl($data->image) . '" style="width: 50px"/>';
                })
                ->addColumn('count_variants', function ($data) {
                    return $data->variants->count();
                })
                ->addColumn('sale_count', function ($data) {
                    return 0;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="'. route('admin.product.restore', $data->id).'" class="btn btn-primary shadow btn-xs sharp me-1 w-auto px-2"><i class="fa-solid fa-arrows-rotate"></i> Restore</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp w-auto" data-url="'. route('admin.product.forcedelete', $data->id).'"><i class="fa-solid fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['show_image', 'count_variants', 'sale_count', 'action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.ecom.product.trash', compact('title', 'list_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Product";
        $list_page = "Products";
        $categories = Category::with('childs')->where('parent_id', NULL)->get();
        $attributes = Attribute::orderBy('id', 'DESC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();
        return view('backend.ecom.product.create', compact('title', 'list_page', 'categories', 'attributes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'sku' => 'required|string|max:255|unique:products',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required',
            'price' => 'required',
            'short_description' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $data = $request->all();
        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'products');
        }
        $product = Product::create($data);
        $product->categories()->attach($request->category);
        $product->attributes()->attach($request->attribute);

        return redirect()->route('admin.product.show', $product->id)->with('success', 'Product has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail(intval($id));
        $title = $product->name;
        $list_page = "Products";
        return view('backend.ecom.product.show', compact('title', 'list_page', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Product";
        $list_page = "Products";
        $categories = Category::with('childs')->where('parent_id', NULL)->get();
        $attributes = Attribute::orderBy('id', 'DESC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();

        $product = Product::findOrFail(intval($id));

        return view('backend.ecom.product.edit', compact('title', 'list_page', 'categories', 'attributes', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail(intval($id));

        if ($request->slug == $product->slug) {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'stock' => 'required',
                'price' => 'required',
                'short_description' => 'required|string|max:255',
                'description' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'stock' => 'required',
                'price' => 'required',
                'short_description' => 'required|string|max:255',
                'description' => 'required',
            ]);
        }



        $data = $request->all();
        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'products');
        }
        $product->update($data);
        $product->categories()->sync($request->category);
        $product->attributes()->sync($request->attribute);

        return redirect()->route('admin.product.show', $product->id)->with('success', 'Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail(intval($id));
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Product has been deleted successfully');
    }


    /**
     * restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $product = Product::withTrashed()->findOrFail(intval($id));
        $product->restore();

        return redirect()->route('admin.product.index')->with('success', 'Product has been restored successfully');
    }


     /**
     * force delete the specified resource from storage.
     */
    public function forceDelete(string $id)
    {
        $product = Product::withTrashed()->findOrFail(intval($id));

        // delete product images
        if($product->images->count() > 0){
            foreach($product->images as $image){
                FileUploadHelper::delete($image->image);
                $image->forceDelete();
            }
        }

        // delete product infos
        if($product->infos->count() > 0){
            foreach($product->infos as $info){
                $info->forceDelete();
            }
        }

        // delete product variants
        if($product->variants->count() > 0){
            foreach($product->variants as $variant){
                $variant->forceDelete();
            }
        }

        $product->categories()->detach();
        $product->attributes()->detach();

        // remove imgae
        FileUploadHelper::delete($product->image);

        $product->forceDelete();

        return redirect()->route('admin.product.index')->with('success', 'Product has been deleted permanently');
    }
}
