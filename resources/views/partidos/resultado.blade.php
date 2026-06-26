/*! Adriana desarrollasora de control de resultados */
<x-app-layout>
    <x-slot name="header">
        <h2>Registrar Resultado del Partido</h2>
    </x-slot>

    <div style="padding: 30px;">
        <h3>
            {{ $partido->equipoLocal->nombre ?? 'Equipo local' }}
            vs
            {{ $partido->equipoVisitante->nombre ?? 'Equipo visitante' }}
        </h3>

        <p>
            <strong>Fecha:</strong> {{ $partido->fecha }}
        </p>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('partidos.resultado.update', $partido) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Puntos del equipo local:</label><br>
            <input 
                type="number" 
                name="puntos_local" 
                value="{{ old('puntos_local', $partido->puntos_local) }}" 
                min="0" 
                required
            ><br><br>

            <label>Puntos del equipo visitante:</label><br>
            <input 
                type="number" 
                name="puntos_visitante" 
                value="{{ old('puntos_visitante', $partido->puntos_visitante) }}" 
                min="0" 
                required
            ><br><br>

            <button type="submit">
                Guardar resultado
            </button>
        </form>

        <br>

        <a href="{{ route('partidos.index') }}">Volver a partidos</a>
    </div>
</x-app-layout>