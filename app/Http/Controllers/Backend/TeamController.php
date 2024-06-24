<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Team";
        $list_page = "Team Members";
        $teams = Team::orderBy('id', 'DESC')->get();
        return view('backend.team.index', compact('title', 'list_page', 'teams'));
    }

    /** 
     * Display a listing of the resource.
     */
    public function trash()
    {
        $title = "Team";
        $list_page = "Team Members";
        $teams = Team::onlyTrashed()->get();
        return view('backend.team.trash', compact('title', 'list_page', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Team";
        $list_page = "Team Members";
        return view('backend.team.create', compact('title', 'list_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'teams');
        }

        Team::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team has been added successfully');
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
        $title = "Team";
        $list_page = "Team Members";
        $team = Team::findOrFail(intval($id));
        return view('backend.team.edit', compact('title', 'list_page', 'team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail(intval($id));

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->image && $request->image instanceof UploadedFile) {
            $data['image'] = FileUploadHelper::store($request->image, 'teams', $team->image);
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail(intval($id));
        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team has been deleted successfully');
    }


    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $team = Team::withTrashed()->findOrFail(intval($id));
        $team->restore();

        return redirect()->route('admin.team.index')->with('success', 'Team has been restored successfully');
    }


    /**
     * Force Delete the specified resource from storage.
     */
    public function forceDelete(string $id)
    {
        $team = Team::withTrashed()->findOrFail(intval($id));
        FileUploadHelper::delete($team->image);
        $team->forceDelete();

        return redirect()->route('admin.team.trash')->with('success', 'Team has been deleted permanently');
    }
}
