<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Resources\MaterialResource;
use App\Filters\MaterialFilter;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Request $request, MaterialFilter $filter)
    {
        $query = Material::query();
        $materials = $filter->apply($query)->get();

        return MaterialResource::collection($materials);
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return new MaterialResource($material);
    }

    public function store(Request $request)
    {
        $material = Material::create($request->all());
        return new MaterialResource($material);
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->update($request->all());
        return new MaterialResource($material);
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return response(null, 204);
    }
}
