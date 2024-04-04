<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\piece; 

class PieceController extends Controller
{
    public function index()
    {
        $pieces = piece::all();
        return response()->json(['data' => $pieces]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:40',
        ]);

        $pieces = Piece::create($request->all());
        return response()->json(['message' => 'Pièce ajoutée avec succès', 'data' => $pieces], 201);
    }

    public function show(string $id)
    {
        $pieces = Piece::findOrFail($id);
        return response()->json(['data' => $pieces]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required|string|max:40',
        ]);

        $pieces = Piece::findOrFail($id);
        $pieces->update($request->all());
        return response()->json(['message' => 'Pièce mise à jour avec succès', 'data' => $pieces]);
    }

    public function destroy(string $id)
    {
        $pieces = Piece::findOrFail($id);
        $pieces->delete();
        return response()->json(['message' => 'Pièce supprimée avec succès']);
    }
}