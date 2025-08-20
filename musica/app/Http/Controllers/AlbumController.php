<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\UpdateAlbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch albums with optional filtering, sorting, and pagination
        $query = Album::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $albums = $query->paginate(10);

        return view('admin.records', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        // Use validated data from the form request
        $data = $request->validated();

        // Handle uploaded image if present
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/albums', 'public');
        }

        // Attach creator id if authenticated
        $data['created_by'] = auth()->id();

        Album::create($data);

        return redirect('/admin/records')->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        try {
            // remove stored cover file if present
            if (!empty($album->image) && Storage::disk('public')->exists($album->image)) {
                Storage::disk('public')->delete($album->image);
            }

            // If model uses SoftDeletes, this will soft-delete. Change to forceDelete() if you want permanent removal.
            $album->delete();

            return redirect('/admin/records')->with('success', 'Album deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Album deletion failed', ['id' => $album->id ?? null, 'error' => $e->getMessage()]);
            return redirect('/admin/records')->with('error', 'Failed to delete album. Check logs.');
        }
    }
}
