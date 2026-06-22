<x-app-layout>
    <x-slot name="header">
        <h2>Gestión de Partidos</h2>
    </x-slot>

    <div style="padding: 30px;">
        <a href="{{ route('partidos.create') }}">Crear partido</a>
        |
        <a href="{{ route('equipos.index') }}">Ver equipos</a>
        |
        <a href="{{ route('jugadores.index') }}">Ver jugadores</a>
        |
        <a href="{{ route('estadisticas.index') }}">Ver estadísticas</a>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <table border="1" cellpadding="10" style="margin-top: 20px;">
            <tr>
                <th>ID</th>
                <th>Local</th>
                <th>Visitante</th>
                <th>Fecha</th>
                <th>Resultado</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

            @foreach($partidos as $partido)
                <tr>
                    <td>{{ $partido->id }}</td>
                    <td>{{ $partido->equipoLocal->nombre ?? 'Sin equipo' }}</td>
                    <td>{{ $partido->equipoVisitante->nombre ?? 'Sin equipo' }}</td>
                    <td>{{ $partido->fecha }}</td>
                    <td>
                        {{ $partido->puntos_local ?? '-' }}
                        -
                        {{ $partido->puntos_visitante ?? '-' }}
                    </td>
                    <td>{{ ucfirst($partido->estado) }}</td>
                    <td>
                        <a href="{{ route('partidos.edit', $partido) }}">Editar</a>

                        <form action="{{ route('partidos.destroy', $partido) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar partido?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
