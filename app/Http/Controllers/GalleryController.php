<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Resources\GalleryResource;
use App\Filters\GalleryFilter;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request, GalleryFilter $filter)
    {
        $query = Gallery::query();
        $galleries = $filter->apply($query)->get();

        return GalleryResource::collection($galleries);
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return new GalleryResource($gallery);
    }

    public function store(Request $request)
    {
        $gallery = Gallery::create($request->all());
        return new GalleryResource($gallery);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return new GalleryResource($gallery);
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return response(null, 204);
    }
}
