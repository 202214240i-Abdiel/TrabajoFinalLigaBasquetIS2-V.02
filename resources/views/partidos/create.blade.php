<x-app-layout>
    <x-slot name="header">
        <h2>Crear Partido</h2>
    </x-slot>

    <div style="padding: 30px;">
        <form action="{{ route('partidos.store') }}" method="POST">
            @csrf

            <label>Equipo local:</label><br>
            <select name="equipo_local_id" required>
                <option value="">Seleccione equipo local</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
            </select><br><br>

            <label>Equipo visitante:</label><br>
            <select name="equipo_visitante_id" required>
                <option value="">Seleccione equipo visitante</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
            </select><br><br>

            <label>Fecha y hora:</label><br>
            <input type="datetime-local" name="fecha" required><br><br>

            <label>Puntos local:</label><br>
            <input type="number" name="puntos_local" min="0"><br><br>

            <label>Puntos visitante:</label><br>
            <input type="number" name="puntos_visitante" min="0"><br><br>

            <label>Estado:</label><br>
            <select name="estado" required>
                <option value="programado">Programado</option>
                <option value="finalizado">Finalizado</option>
            </select><br><br>

            <button type="submit">Guardar</button>
        </form>

        <br>
        <a href="{{ route('partidos.index') }}">Volver</a>
    </div>
</x-app-layout>
