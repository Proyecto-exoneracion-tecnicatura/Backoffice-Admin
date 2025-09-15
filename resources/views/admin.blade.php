<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Backoffice</title>
</head>
<body>
    <h1>Bienvenido al Backoffice</h1>

    {{-- Botón para cerrar sesión --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
