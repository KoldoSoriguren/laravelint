<?php

namespace App\Http\Controllers;
use App\Models\Torneo;

use Illuminate\Http\Request;

class TorneoController extends Controller
{
    
    public function index(){
        $var = Torneo::all();
        return view('torneos.index', ['var'=>$var]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('torneos.crearTorneo');

    }


    /**
     * Store a newly created resource in storage.
        */
    public function store(Request $request){

        $validated = $request->validate([
            'juego_id' => 'required|exists:juegos,id',
            'titulo' => 'required|string|max:255',
            'plazas' => 'required|integer|min:1',
            'estado' => 'required|in:abierto,cerrado',
            'descripcion' => 'nullable|string',
        ]);
        
        // Convertir "abierto"/"cerrado" a boolean
        $validated['estado'] = $validated['estado'] === 'abierto';

        Torneo::create($validated);

        return redirect()->route('torneos.index');
    }
    public function inscribir(string $id)
    {
        $torneo = Torneo::findOrFail($id);
        $userId = session('user')->id; // Suponiendo que el ID del usuario está almacenado en la sesión

        // Verificar si el usuario ya está inscrito
        if (!$torneo->users()->where('user_id', $userId)->exists()) {
            $torneo->users()->attach($userId);
        }

        return redirect()->route('torneos.index');
    }



    public function cerrar(string $id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->estado = false;
        $torneo->save();
        return redirect()->route('torneos.index');
    }
    public function abrir(string $id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->estado = true;
        $torneo->save();
        return redirect()->route('torneos.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('torneos.verTorneo', ['torneo' => $torneo]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $torneo = Torneo::findOrFail($id);
        $torneo->delete();
        return redirect()->route('torneos.index');
    }
}
