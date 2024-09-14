<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Resources\PhotoResource;
use App\Filters\PhotoFilter;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request, PhotoFilter $filter)
    {
        $query = Photo::query();
        $photos = $filter->apply($query)->get();

        return PhotoResource::collection($photos);
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return new PhotoResource($photo);
    }

    public function store(Request $request)
    {
        $photo = Photo::create($request->all());
        return new PhotoResource($photo);
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);
        $photo->update($request->all());
        return new PhotoResource($photo);
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return response(null, 204);
    }
}
