<x-app-layout>
    <x-slot name="header">
        <h2>Editar Partido</h2>
    </x-slot>

    <div style="padding: 30px;">
        <form action="{{ route('partidos.update', $partido) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Equipo local:</label><br>
            <select name="equipo_local_id" required>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $partido->equipo_local_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select><br><br>

            <label>Equipo visitante:</label><br>
            <select name="equipo_visitante_id" required>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ $partido->equipo_visitante_id == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select><br><br>

            <label>Fecha y hora:</label><br>
            <input type="datetime-local" name="fecha" value="{{ date('Y-m-d\TH:i', strtotime($partido->fecha)) }}" required><br><br>

            <label>Puntos local:</label><br>
            <input type="number" name="puntos_local" value="{{ $partido->puntos_local }}" min="0"><br><br>

            <label>Puntos visitante:</label><br>
            <input type="number" name="puntos_visitante" value="{{ $partido->puntos_visitante }}" min="0"><br><br>

            <label>Estado:</label><br>
            <select name="estado" required>
                <option value="programado" {{ $partido->estado == 'programado' ? 'selected' : '' }}>Programado</option>
                <option value="finalizado" {{ $partido->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select><br><br>

            <button type="submit">Actualizar</button>
        </form>

        <br>
        <a href="{{ route('partidos.index') }}">Volver</a>
    </div>
</x-app-layout>
