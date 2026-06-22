# Documentación técnica: Sistema de Gestión de Liga de Básquetbol

## Descripción general

El sistema desarrollado corresponde a una aplicación web para gestionar la información principal de una liga de básquetbol. La aplicación permite registrar usuarios, iniciar sesión y administrar los módulos de equipos, jugadores, partidos y estadísticas básicas. El proyecto fue implementado con PHP usando el framework Laravel, MySQL como base de datos y Git/GitHub como herramienta de control de versiones.

## Arquitectura del sistema

La aplicación utiliza la arquitectura MVC de Laravel. En esta estructura, los modelos representan las entidades principales del sistema, los controladores procesan las solicitudes del usuario y las vistas muestran la información en el navegador. Las rutas se encuentran en `routes/web.php` y están protegidas con el middleware `auth`, de modo que solo los usuarios autenticados puedan acceder a los módulos administrativos.

Los modelos principales son `Equipo`, `Jugador` y `Partido`. El modelo `Equipo` almacena datos como nombre, ciudad y entrenador. El modelo `Jugador` almacena nombre, apellido, posición, número y el equipo al que pertenece. El modelo `Partido` registra el equipo local, equipo visitante, fecha, puntajes y estado del encuentro.

## Controladores y funcionalidades

El controlador `EquipoController` permite listar, crear, editar, actualizar y eliminar equipos. El controlador `JugadorController` gestiona jugadores asociados a equipos mediante una relación de base de datos. El controlador `PartidoController` permite registrar partidos entre dos equipos diferentes, incluyendo fecha, puntajes y estado. Finalmente, `EstadisticaController` muestra un resumen general del sistema, como total de equipos, total de jugadores, total de partidos y cantidad de jugadores por equipo.

## Base de datos

La base de datos contiene tablas para usuarios, equipos, jugadores y partidos. La relación entre equipos y jugadores es de uno a muchos, ya que un equipo puede tener varios jugadores. La tabla de partidos contiene dos claves foráneas hacia la tabla equipos: una para el equipo local y otra para el equipo visitante. Esto permite representar correctamente los enfrentamientos entre equipos.

## Fragmentos relevantes

Una parte importante del sistema es la relación entre jugador y equipo. En el modelo `Jugador` se define `belongsTo(Equipo::class)`, lo que permite obtener el equipo de cada jugador. En el modelo `Equipo` se define `hasMany(Jugador::class)`, lo que permite listar todos los jugadores que pertenecen a un equipo. También se aplican validaciones en los controladores para evitar registros incompletos, por ejemplo exigir el nombre del equipo, el equipo del jugador y que en un partido el equipo local sea diferente al visitante.

## Problemas encontrados y soluciones

Durante el desarrollo surgieron problemas de configuración relacionados con Composer, Git, Node.js y la compilación de estilos. También se presentaron errores por migraciones duplicadas, especialmente en las tablas de equipos y jugadores. La solución fue ordenar los archivos de migración, eliminar duplicados y ejecutar nuevamente las migraciones con `php artisan migrate:fresh`. Además, se corrigió la configuración de vistas para trabajar correctamente con los archivos compilados del proyecto.

## Decisiones técnicas

Se decidió usar Laravel Breeze para la autenticación, ya que permite implementar rápidamente registro e inicio de sesión. También se utilizó una estructura simple de vistas Blade para facilitar la comprensión del proyecto. Las rutas administrativas fueron protegidas con autenticación para evitar que usuarios no registrados puedan modificar información. El uso de GitHub permite evidenciar el avance progresivo del desarrollo mediante commits.
