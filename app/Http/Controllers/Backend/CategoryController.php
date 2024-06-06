<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('childs')->where('parent_id', NULL)->get();
        return view('backend.category.index', compact('categories'));
    }

    // trash item list
    public function trash()
    {
        $categories = Category::withTrashed()->where('deleted_at', '!=', NULL)->get();
        return view('backend.category.trash', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('childs')->where('parent_id', NULL)->get();
        return view('backend.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
        ]);

        $data = $request->all();


        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'categories');
        }

        if ($request->icon && $request->icon instanceof UploadedFile) {
            $data['icon'] = FileUploadHelper::store($request->icon, 'categories');
        }

        Category::create($data);
        return redirect()->route('admin.category.index')->with('success', 'Category has been created successfully');
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
    public function edit($id)
    {
        $category = Category::findOrFail(intval($id));
        $categories = Category::with('childs')->where('parent_id', NULL)->get();
        return view('backend.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail(intval($id));

        if ($request->slug) {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:categories',
            ]);
        }

        $data = $request->all();


        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'categories', $category->image);
        }

        if ($request->icon && $request->icon instanceof UploadedFile) {
            $data['icon'] = FileUploadHelper::store($request->icon, 'categories', $category->icon);
        }

        $category->update($data);
        return redirect()->route('admin.category.index')->with('success', 'Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail(intval($id));

        // childs delete
        if($category->childs->count() > 0){
            foreach($category->childs as $subcat){
                // childs delete
                if($subcat->childs->count() > 0){
                    foreach($subcat->childs as $child){
                        $child->delete();
                    }
                }

                $subcat->delete();
            }
        }

        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category has been deleted successfully');
    }

    // restore
    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail(intval($id));

        $parent = Category::withTrashed()->where('id', $category->parent_id)->where('deleted_at', '!=', NULL)->first();

        if($parent){
            return redirect()->route('admin.category.trash')->with('error', 'Restore parent category first!!');
        }else{
            $category->restore();
            return redirect()->route('admin.category.index')->with('success', 'Category has been restored successfully');
        }

    }

    // force delete
    public function forceDelete($id)
    {
        $category = Category::withTrashed()->findOrFail(intval($id));

        $childs = Category::withTrashed()->where('parent_id', $category->id)->get();
        if($childs->count() > 0){
            return redirect()->route('admin.category.trash')->with('error', 'Delete child categories first!!');
        }else{
            $category->forceDelete();
            return redirect()->route('admin.category.trash')->with('success', 'Category has been deleted permanently');
        }
    }
}
