<x-app-layout>
    <x-slot name="header">
        <h2>Panel Principal</h2>
    </x-slot>

    <div style="padding: 30px;">
        <h3>Sistema de Gestión de Liga de Básquetbol</h3>
        <p>Bienvenido. Selecciona un módulo para administrar la información de la liga.</p>

        <div class="module-links">
            <a href="{{ route('equipos.index') }}">Gestión de equipos</a>
            <a href="{{ route('jugadores.index') }}">Gestión de jugadores</a>
            <a href="{{ route('partidos.index') }}">Registro de partidos</a>
            <a href="{{ route('estadisticas.index') }}">Estadísticas básicas</a>
        </div>
    </div>
</x-app-layout>
