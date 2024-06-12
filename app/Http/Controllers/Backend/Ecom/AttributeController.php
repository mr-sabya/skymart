<?php

namespace App\Http\Controllers\Backend\Ecom;

use App\Data\AttributeShapes;
use App\Data\AttributeTypes;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Attribute";
        $list_page = "Attributes";
        $attributes = Attribute::orderBy('id', 'DESC')->get();
        return view('backend.ecom.attribute.index', compact('attributes', 'title', 'list_page'));
    }

    // trash item list
    public function trash()
    {
        $title = "Attribute";
        $list_page = "Attributes";
        $attributes = Attribute::withTrashed()->where('deleted_at', '!=', NULL)->get();
        return view('backend.ecom.attribute.trash', compact('title', 'list_page', 'attributes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Attribute";
        $list_page = "Attributes";
        $types = AttributeTypes::getData();
        $shapes = AttributeShapes::getData();
        // return $types;
        return view('backend.ecom.attribute.create', compact('title', 'list_page', 'types', 'shapes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'shape' => 'required',
        ]);

        $data = $request->all();
        Attribute::create($data);

        return redirect()->route('admin.attribute.index')->with('success', 'Attribute has been created successfully');
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
        $title = "Attribute";
        $list_page = "Attributes";
        $types = AttributeTypes::getData();
        $shapes = AttributeShapes::getData();

        $attribute = Attribute::findOrFail(intval($id));
        
        return view('backend.ecom.attribute.edit', compact('title', 'list_page', 'types', 'shapes', 'attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attribute = Attribute::findOrFail(intval($id));
        
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'shape' => 'required',
        ]);

        $data = $request->all();
        $attribute->update($data);

        return redirect()->route('admin.attribute.index')->with('success', 'Attribute has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = Attribute::findOrFail(intval($id));
        $attribute->delete();
        return redirect()->route('admin.attribute.index')->with('success', 'Attribute has been deleted successfully');
    }

    // restore
    public function restore($id)
    {
        $attribute = Attribute::withTrashed()->findOrFail(intval($id));
        $attribute->restore();

        return redirect()->route('admin.attribute.index')->with('success', 'Attribute has been restored successfully');
    }


    // force delete
    public function forceDelete($id)
    {
        $attribute = Attribute::withTrashed()->findOrFail(intval($id));
        $attribute->forceDelete();

        return redirect()->route('admin.attribute.trash')->with('success', 'Attribute has been deleted permanently');
    }
}
