<x-app-layout>
    <x-slot name="header">
        <h2>Gestión de Jugadores</h2>
    </x-slot>

    <div style="padding: 30px;">
        <a href="{{ route('jugadores.create') }}">Crear jugador</a>
        |
        <a href="{{ route('equipos.index') }}">Ver equipos</a>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <table border="1" cellpadding="10" style="margin-top: 20px;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Posición</th>
                <th>Número</th>
                <th>Equipo</th>
                <th>Acciones</th>
            </tr>

            @foreach($jugadores as $jugador)
                <tr>
                    <td>{{ $jugador->id }}</td>
                    <td>{{ $jugador->nombre }}</td>
                    <td>{{ $jugador->apellido }}</td>
                    <td>{{ $jugador->posicion }}</td>
                    <td>{{ $jugador->numero }}</td>
                    <td>{{ $jugador->equipo->nombre ?? 'Sin equipo' }}</td>
                    <td>
                        <a href="{{ route('jugadores.edit', $jugador) }}">Editar</a>

                        <form action="{{ route('jugadores.destroy', $jugador) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar jugador?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
