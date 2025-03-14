<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aisle;

class AisleController extends Controller
{ 
    
    public function index()
    {
        $aisle = Aisle::all();
        return response()->json($aisle);
    }

    public function show($id)
    {
        $aisle = Aisle::find($id);
        if (!$aisle) {
            return response()->json(['message' => 'Aisle not found'], 404);
        }
        return response()->json($aisle);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'=> 'nullable|boolean',
        ]);

        $aisle = Aisle::create($request->all());
        return response()->json($aisle, 201);
    }

    public function update(Request $request, $id)
    {
        $aisle = Aisle::find($id);
        if (!$aisle) {
            return response()->json(['message' => 'Aisle not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status'=> 'nullable|boolean',
        ]);

        $aisle->update($request->all());
        return response()->json($aisle);
    }

    public function destroy($id)
    {
        $aisle = Aisle::find($id);
        if (!$aisle) {
            return response()->json(['message' => 'Aisle not found'], 404);
        }

        $aisle->delete();
        return response()->json(['message' => 'Aisle removed']);
    }
}
