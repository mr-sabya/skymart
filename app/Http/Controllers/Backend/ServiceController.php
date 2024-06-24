<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Service";
        $list_page = "Services";
        $services = Service::orderBy('id', 'DESC')->get();
        return view('backend.service.index', compact('title', 'list_page', 'services'));
    }

    /**
     * Display a listing of the trash resource.
     */
    public function trash()
    {
        $title = "Service";
        $list_page = "Services";
        $services = Service::onlyTrashed()->get();
        return view('backend.service.trash', compact('title', 'list_page', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Service";
        $list_page = "Services";
        return view('backend.service.create', compact('title', 'list_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'services');
        }

        Service::create($data);

        return redirect()->route('admin.service.index')->with('success', 'Service has beed added successfully');
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
        $title = "Service";
        $list_page = "Services";
        $service = Service::findOrFail(intval($id));
        return view('backend.service.edit', compact('title', 'list_page', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail(intval($id));

        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'services', $service->image);
        }

        $service->update($data);

        return redirect()->route('admin.service.index')->with('success', 'Service has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail(intval($id));
        $service->delete();

        return redirect()->route('admin.service.index')->with('success', 'Service has been deleted successfully');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $service = Service::withTrashed()->findOrFail(intval($id));
        $service->restore();

        return redirect()->route('admin.service.index')->with('success', 'Service has been restored successfully');
    }

    /**
     * Force Delete the specified resource from storage.
     */
    public function forceDelete(string $id)
    {
        $service = Service::withTrashed()->findOrFail(intval($id));
        FileUploadHelper::delete($service->image);
        $service->forceDelete();

        return redirect()->route('admin.service.trash')->with('success', 'Service has been deleted permanently');
    }
}
