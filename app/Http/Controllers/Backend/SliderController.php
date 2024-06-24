<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Slider";
        $list_page = "Sliders";
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('backend.slider.index', compact('title', 'list_page', 'sliders'));
    }

    // display a listing of trash items
    public function trash()
    {
        $title = "Slider";
        $list_page = "Sliders";
        $sliders = Slider::onlyTrashed()->get();
        return view('backend.slider.trash', compact('title', 'list_page', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Slider";
        $list_page = "Sliders";
        return view('backend.slider.create', compact('title', 'list_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'offer_text' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'sliders');
        }

        Slider::create($data);

        return redirect()->route('admin.slider.index')->with('success', 'Slider has beed added suucessfully');
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
        $title = "Slider";
        $list_page = "Sliders";
        $slider = Slider::findOrFail(intval($id));
        return view('backend.slider.edit', compact('title', 'list_page', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail(intval($id));

        $request->validate([
            'title' => 'required|string|max:255',
            'offer_text' => 'required|string|max:255',
            'button_text' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'sliders', $slider->image);
        }

        $slider->update($data);

        return redirect()->route('admin.slider.index')->with('success', 'Slider has been updated suucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail(intval($id));
        $slider->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Slider has been deleted suucessfully');
    }

    /**
     * restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $slider = Slider::withTrashed()->findOrFail(intval($id));
        $slider->restore();

        return redirect()->route('admin.slider.index')->with('success', 'Slider has been restored suucessfully');
    }

    /**
     * force delete the specified resource from storage.
     */
    public function forceDelete(string $id)
    {
        $slider = Slider::withTrashed()->findOrFail(intval($id));
        FileUploadHelper::delete($slider->image);
        $slider->forceDelete();

        return redirect()->route('admin.slider.trash')->with('success', 'Slider has been Deleted suucessfully');
    }
}
