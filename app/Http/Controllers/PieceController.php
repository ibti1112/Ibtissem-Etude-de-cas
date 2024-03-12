<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\piece; 

class PieceController extends Controller
{
    public function index()
    {
        $piece = piece::all(); 
        return response()->json(['data' => $piece]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:40',
        ]);

        $piece = Piece::create($request->all());
        return response()->json(['message' => 'Pièce ajoutée avec succès', 'data' => $piece], 201);
    }

    public function show(string $id)
    {
        $piece = Piece::findOrFail($id);
        return response()->json(['data' => $piece]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required|string|max:40',
        ]);

        $piece = Piece::findOrFail($id);
        $piece->update($request->all());
        return response()->json(['message' => 'Pièce mise à jour avec succès', 'data' => $piece]);
    }

    public function destroy(string $id)
    {
        $piece = Piece::findOrFail($id);
        $piece->delete();
        return response()->json(['message' => 'Pièce supprimée avec succès']);
    }
}