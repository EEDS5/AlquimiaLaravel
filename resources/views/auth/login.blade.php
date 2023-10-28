<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>

<h2>Iniciar sesión</h2>

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('authenticate') }}">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="passwordSalt">Contraseña:</label>
        <input type="password" id="passwordSalt" name="passwordSalt" required>
    </div>

    <button type="submit">Iniciar sesión</button>
</form>

</body>
</html>