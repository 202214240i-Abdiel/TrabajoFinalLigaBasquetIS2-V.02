<x-app-layout>
    <x-slot name="header">
        <h2>Editar Equipo</h2>
    </x-slot>

    <div style="padding: 30px;">
        <form action="{{ route('equipos.update', $equipo) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="{{ $equipo->nombre }}" required><br><br>

            <label>Ciudad:</label><br>
            <input type="text" name="ciudad" value="{{ $equipo->ciudad }}"><br><br>

            <label>Entrenador:</label><br>
            <input type="text" name="entrenador" value="{{ $equipo->entrenador }}"><br><br>

            <button type="submit">Actualizar</button>
        </form>

        <br>
        <a href="{{ route('equipos.index') }}">Volver</a>
    </div>
</x-app-layout>
