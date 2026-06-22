<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Partido;

class EstadisticaController extends Controller
{
    public function index()
    {
        $totalEquipos = Equipo::count();
        $totalJugadores = Jugador::count();
        $totalPartidos = Partido::count();
        $partidosFinalizados = Partido::where('estado', 'finalizado')->count();

        $equipos = Equipo::withCount('jugadores')->get();

        return view('estadisticas.index', compact(
            'totalEquipos',
            'totalJugadores',
            'totalPartidos',
            'partidosFinalizados',
            'equipos'
        ));
    }
}
