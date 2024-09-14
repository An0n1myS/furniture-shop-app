<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Resources\ColorResource;
use App\Filters\ColorFilter;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(Request $request, ColorFilter $filter)
    {
        $query = Color::query();
        $colors = $filter->apply($query)->get();

        return ColorResource::collection($colors);
    }

    public function show($id)
    {
        $color = Color::findOrFail($id);
        return new ColorResource($color);
    }

    public function store(Request $request)
    {
        $color = Color::create($request->all());
        return new ColorResource($color);
    }

    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);
        $color->update($request->all());
        return new ColorResource($color);
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return response(null, 204);
    }
}
