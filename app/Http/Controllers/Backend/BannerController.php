<?php

namespace App\Http\Controllers\Backend;

use App\Data\BannerTypes;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Utilities\FileUploadHelper;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Banner";
        $list_page = "Banners";
        $banners = Banner::orderBy('id', 'DESC')->get();
        return view('backend.banner.index', compact('title', 'list_page', 'banners'));
    }

    /**
     * Display a listing of the resource.
     */
    public function trash()
    {
        $title = "Banner";
        $list_page = "Banners";
        $banners = Banner::onlyTrashed()->get();
        return view('backend.banner.trash', compact('title', 'list_page', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Banner";
        $list_page = "Banners";
        $types = BannerTypes::getData();
        return view('backend.banner.create', compact('title', 'list_page', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'banners');
        }

        Banner::create($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner has beed added successfully');
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
        $title = "Banner";
        $list_page = "Banners";
        $types = BannerTypes::getData();
        $banner = Banner::findOrFail(intval($id));
        return view('backend.banner.edit', compact('title', 'list_page', 'types', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail(intval($id));

        $request->validate([
            'type' => 'required',
            'title' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'banners', $banner->image);
        }

        $banner->update($data);

        return redirect()->route('admin.banner.index')->with('success', 'Banner has beed updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail(intval($id));
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner has beed deleted successfully');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $banner = Banner::withTrashed()->findOrFail(intval($id));
        $banner->restore();
        return redirect()->route('admin.banner.index')->with('success', 'Banner has beed restored successfully');
    }

    /**
     * Force Delete the specified resource from storage.
     */
    public function forceDelete(string $id)
    {
        $banner = Banner::withTrashed()->findOrFail(intval($id));
        FileUploadHelper::delete($banner->image);
        $banner->forceDelete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner has beed deleted permanently');
    }
}
