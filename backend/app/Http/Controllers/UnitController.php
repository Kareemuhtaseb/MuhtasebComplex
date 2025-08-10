<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Unit::with('property')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'property_id' => ['required', 'exists:properties,id'],
            'code' => ['required', 'string'],
            'floor' => ['nullable', 'string'],
            'area_m2' => ['nullable', 'numeric'],
            'status' => ['nullable', 'string'],
        ]);

        return Unit::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Unit::with('property')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = Unit::findOrFail($id);
        $data = $request->validate([
            'property_id' => ['sometimes', 'exists:properties,id'],
            'code' => ['sometimes', 'string'],
            'floor' => ['nullable', 'string'],
            'area_m2' => ['nullable', 'numeric'],
            'status' => ['nullable', 'string'],
        ]);
        $unit->update($data);
        return $unit;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return response()->noContent();
    }
}
