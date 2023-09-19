<!DOCTYPE html>
<html>
<head>
    <title>Crear Semestre</title>
</head>
<body>
    <h1>Crear Semestre</h1>
    <form method="POST" action="{{ route('semester.store') }}">
        @csrf
        <label for="dateStart">Fecha de Inicio:</label>
        <input type="date" name="dateStart" required><br><br>
        <label for="dateEnd">Fecha de Fin:</label>
        <input type="date" name="dateEnd" required><br><br>
        <label for="frozen">Disponible:</label>
        <input type="checkbox" name="frozen"><br><br>
        <input type="submit" value="Crear Semestre">
    </form>
</body>
</html>
