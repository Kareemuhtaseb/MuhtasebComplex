<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Property::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'address' => ['nullable', 'string'],
            'currency' => ['required', 'string', 'size:3'],
            'tax_rate' => ['nullable', 'numeric'],
        ]);

        return Property::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Property::with('units')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::findOrFail($id);
        $data = $request->validate([
            'name' => ['sometimes', 'string'],
            'address' => ['nullable', 'string'],
            'currency' => ['sometimes', 'string', 'size:3'],
            'tax_rate' => ['nullable', 'numeric'],
        ]);
        $property->update($data);
        return $property;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return response()->noContent();
    }
}
