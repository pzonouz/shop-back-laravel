<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use Gate;
use Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Image::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        Gate::authorize('create', Image::class);
        $request->validated();
        $path = Storage::disk('public')->putFile('images', $request->file('image'));
        if ($path) {
            $request->merge(['path' => $path]);
            return Image::create($request->only('path', 'product_id'));
        }
        return response()->json(['message' => 'something went wrong'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return $image;
    }
    public function destroy(Image $image)
    {
        Gate::authorize('delete', $image);
        Storage::disk('public')->delete($image->path);
        $image->delete();
        return response()->noContent();
    }
}
