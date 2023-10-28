<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>¡Bienvenido al Dashboard!</h2>

<p>Esta es la página protegida. Solo puedes ver esta página si has iniciado sesión correctamente.</p>

<!-- Contenido del dashboard aquí -->

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

</body>
</html>