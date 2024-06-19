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
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.tag.edit', $data->id) . '" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-pencil-alt"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="' . route('admin.tag.destroy', $data->id) . '"><i class="fa-solid fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        // return Product::with('attributes')->get();

        return view('backend.ecom.product.index', compact('title', 'list_page'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
