<x-app-layout>
    <x-slot name="header">
        <h2>Editar Jugador</h2>
    </x-slot>

    <div style="padding: 30px;">
        <form action="{{ route('jugadores.update', $jugador) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Equipo:</label><br>
            <select name="equipo_id" required>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $jugador->equipo_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select><br><br>

            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="{{ $jugador->nombre }}" required><br><br>

            <label>Apellido:</label><br>
            <input type="text" name="apellido" value="{{ $jugador->apellido }}" required><br><br>

            <label>Posición:</label><br>
            <input type="text" name="posicion" value="{{ $jugador->posicion }}"><br><br>

            <label>Número:</label><br>
            <input type="number" name="numero" value="{{ $jugador->numero }}"><br><br>

            <button type="submit">Actualizar</button>
        </form>

        <br>
        <a href="{{ route('jugadores.index') }}">Volver</a>
    </div>
</x-app-layout>
