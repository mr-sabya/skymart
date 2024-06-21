<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AttributeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($attribute)
    {
        $attribute = Attribute::findOrFail(intval($attribute));
        $title = $attribute->name;
        $list_page = "Attribute Items";
        $items = AttributeItem::orderBy('id', 'DESC')->where('attribute_id', $attribute->id)->get();
        return view('backend.ecom.attributeitem.index', compact('title', 'list_page', 'attribute', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $attribute = Attribute::findOrFail(intval($id));
        $title = $attribute->name;
        $list_page = "Attribute Items";
        return view('backend.ecom.attributeitem.create', compact('title', 'list_page', 'attribute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attribute = Attribute::where('id', $request->attribute_id)->firstOrFail();

        if ($attribute->type == 1) {
            $request->validate([
                'name' => 'required|string|max:255',
                'color_code' => 'required|string',
            ]);
        } elseif ($attribute->type == 3) {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        }

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'brands');
        }

        AttributeItem::create($data);

        return redirect()->route('admin.attribute-item.index', $attribute->id)->with('success', 'Attribute Item has been added successfully');
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
        $title = "Attribute Item";
        $list_page = "Attribute Items";
        $item = AttributeItem::findOrFail(intval($id));
        $attribute = Attribute::where('id', $item->attribute_id)->first();
        return view('backend.ecom.attributeitem.edit', compact('title', 'list_page', 'item', 'attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = AttributeItem::findOrFail(intval($id));
        $attribute = Attribute::where('id', $item->attribute_id)->firstOrFail();

        if ($attribute->type == 1) {
            $request->validate([
                'name' => 'required|string|max:255',
                'color_code' => 'required|string',
            ]);
        } elseif ($attribute->type == 3) {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        }

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'brands', $item->image);
        }

        $item->update($data);

        return redirect()->route('admin.attribute-item.index', $attribute->id)->with('success', 'Attribute Item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = AttributeItem::findOrFail(intval($id));
        $attribute = Attribute::where('id', $item->attribute_id)->firstOrFail();
        $item->forceDelete();
        return redirect()->route('admin.attribute-item.index', $attribute->id)->with('success', 'Attribute Item has been Deleted successfully');
    }
}
