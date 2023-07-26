<?php

namespace App\Http\Controllers;

use App\Models\lawyer;
use App\Http\Requests\StorelawyerRequest;
use App\Http\Requests\UpdatelawyerRequest;

class LawyerController extends Controller
{
    public function index()
    {
        // Récupère tous les avocats
        $lawyers = Lawyer::all();

        // Retourne une vue avec les données des avocats
        return view('lawyers.index', compact('lawyers'));
    }

    public function create()
    {
        // Retourne une vue pour créer un nouvel avocat
        return view('lawyers.create');
    }

    public function store(Request $request)
    {
        // Valide les données de la requête
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:lawyers',
            'function' => 'required',
            'level' => 'required|integer|min:1|max:5',
        ]);

        // Crée un nouvel avocat avec les données validées
        Lawyer::create($request->all());

        // Redirige vers la liste des avocats avec un message de succès
        return redirect()->route('lawyers.index')->with('success', 'Avocat créé avec succès.');
    }
}
