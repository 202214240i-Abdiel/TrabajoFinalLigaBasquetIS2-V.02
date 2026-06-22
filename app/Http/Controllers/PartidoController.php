<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::with(['equipoLocal', 'equipoVisitante'])->get();
        return view('partidos.index', compact('partidos'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id|different:equipo_visitante_id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha' => 'required|date',
            'puntos_local' => 'nullable|integer|min:0',
            'puntos_visitante' => 'nullable|integer|min:0',
            'estado' => 'required|in:programado,finalizado',
        ]);

        Partido::create($request->all());

        return redirect()->route('partidos.index')
            ->with('success', 'Partido creado correctamente.');
    }

    public function edit(Partido $partido)
    {
        $equipos = Equipo::all();
        return view('partidos.edit', compact('partido', 'equipos'));
    }

    public function update(Request $request, Partido $partido)
    {
        $request->validate([
            'equipo_local_id' => 'required|exists:equipos,id|different:equipo_visitante_id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'fecha' => 'required|date',
            'puntos_local' => 'nullable|integer|min:0',
            'puntos_visitante' => 'nullable|integer|min:0',
            'estado' => 'required|in:programado,finalizado',
        ]);

        $partido->update($request->all());

        return redirect()->route('partidos.index')
            ->with('success', 'Partido actualizado correctamente.');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();

        return redirect()->route('partidos.index')
            ->with('success', 'Partido eliminado correctamente.');
    }
}
