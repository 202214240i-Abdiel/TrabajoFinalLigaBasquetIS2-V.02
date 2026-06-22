<x-app-layout>
    <x-slot name="header">
        <h2>Crear Jugador</h2>
    </x-slot>

    <div style="padding: 30px;">
        <form action="{{ route('jugadores.store') }}" method="POST">
            @csrf

            <label>Equipo:</label><br>
            <select name="equipo_id" required>
                <option value="">Seleccione un equipo</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
            </select><br><br>

            <label>Nombre:</label><br>
            <input type="text" name="nombre" required><br><br>

            <label>Apellido:</label><br>
            <input type="text" name="apellido" required><br><br>

            <label>Posición:</label><br>
            <input type="text" name="posicion"><br><br>

            <label>Número:</label><br>
            <input type="number" name="numero"><br><br>

            <button type="submit">Guardar</button>
        </form>

        <br>
        <a href="{{ route('jugadores.index') }}">Volver</a>
    </div>
</x-app-layout>
