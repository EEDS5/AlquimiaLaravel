<!DOCTYPE html>
<html>
<head>
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Cliente</h1>
    <form method="POST" action="{{ route('client.store') }}">
        @csrf
        <label for="fullName">Full Name:</label>
        <input type="text" name="fullName" required><br><br>
        <label for="passwordSalt">Password Salt (BLOB):</label>
        <input type="password" name="passwordSalt"><br><br>
        <label for="passwordHash">Password Hash (BLOB):</label>
        <input type="password" name="passwordHash"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Crear Cliente">
    </form>
</body>
</html>
