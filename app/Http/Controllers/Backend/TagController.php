<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Tag";
        $list_page = "Tags";

        if (request()->ajax()) {
            return datatables()->of(Tag::latest()->get())
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

        return view('backend.tag.index', compact('title', 'list_page'));
    }

    // trash item list
    public function trash()
    {
        $title = "Tag";
        $list_page = "Tags";

        if (request()->ajax()) {
            return datatables()->of(Tag::onlyTrashed()->get())
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('admin.tag.restore', $data->id) . '" class="btn btn-primary shadow btn-xs sharp me-1 w-auto px-2"><i class="fa-solid fa-arrows-rotate"></i> Restore</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="' . route('admin.tag.forcedelete', $data->id) . '"><i class="fa-solid fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.tag.trash', compact('title', 'list_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tag";
        $list_page = "Tags";
        return view('backend.tag.create', compact('title', 'list_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tags',
        ]);

        $data = $request->all();
        Tag::create($data);

        return redirect()->route('admin.tag.index')->with('success', 'Tag has been created successfully');
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
        $title = "Tag";
        $list_page = "Tags";
        $tag = Tag::findOrFail(intval($id));
        return view('backend.tag.edit', compact('title', 'list_page', 'tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tag::findOrFail(intval($id));

        if ($request->slug == $tag->slug) {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:tags',
            ]);
        }

        $data = $request->all();
        $tag->update($data);

        return redirect()->route('admin.tag.index')->with('success', 'Tag has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail(intval($id));
        $tag->delete();

        return redirect()->route('admin.tag.index')->with('success', 'Tag has been deleted successfully');
    }

    // restore
    public function restore($id)
    {
        $tag = Tag::withTrashed()->findOrFail(intval($id));
        $tag->restore();

        return redirect()->route('admin.tag.index')->with('success', 'Tag has been restored successfully');
    }


    // force delete
    public function forceDelete($id)
    {
        $tag = Tag::withTrashed()->findOrFail(intval($id));
        $tag->forceDelete();
        
        return redirect()->route('admin.tag.trash')->with('success', 'Tag has been deleted permanently');
    }
}
