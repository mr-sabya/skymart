<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        // return Product::with('categories')->get();

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
        //
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
