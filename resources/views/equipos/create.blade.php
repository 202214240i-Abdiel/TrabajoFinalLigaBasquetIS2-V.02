<x-app-layout>
    <x-slot name="header">
        <h2>Crear Equipo</h2>
    </x-slot>

    <div style="padding: 30px;">
        <form action="{{ route('equipos.store') }}" method="POST">
            @csrf

            <label>Nombre:</label><br>
            <input type="text" name="nombre" required><br><br>

            <label>Ciudad:</label><br>
            <input type="text" name="ciudad"><br><br>

            <label>Entrenador:</label><br>
            <input type="text" name="entrenador"><br><br>

            <button type="submit">Guardar</button>
        </form>

        <br>
        <a href="{{ route('equipos.index') }}">Volver</a>
    </div>
</x-app-layout>
