<x-app-layout>
    <x-slot name="header">
        <h2>Estadísticas Básicas</h2>
    </x-slot>

    <div style="padding: 30px;">
        <a href="{{ route('equipos.index') }}">Ver equipos</a>
        |
        <a href="{{ route('jugadores.index') }}">Ver jugadores</a>
        |
        <a href="{{ route('partidos.index') }}">Ver partidos</a>

        <h3 style="margin-top: 20px;">Resumen general</h3>

        <ul>
            <li>Total de equipos: {{ $totalEquipos }}</li>
            <li>Total de jugadores: {{ $totalJugadores }}</li>
            <li>Total de partidos: {{ $totalPartidos }}</li>
            <li>Partidos finalizados: {{ $partidosFinalizados }}</li>
        </ul>

        <h3>Jugadores por equipo</h3>

        <table border="1" cellpadding="10">
            <tr>
                <th>Equipo</th>
                <th>Cantidad de jugadores</th>
            </tr>

            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->jugadores_count }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
