<!DOCTYPE html>
<html>
<head>
    <title>Crear Plato</title>
</head>
<body>
    <h1>Crear Plato</h1>
    <form method="POST" action="{{ route('plate.store') }}">
        @csrf
        <label for="plateName">Nombre del Plato:</label>
        <input type="text" name="plateName" required><br><br>
        <label for="defaultPrice">Precio por Defecto:</label>
        <input type="number" name="defaultPrice" step="0.01" required><br><br>
        <label for="descriptionShort">Descripción Corta:</label>
        <input type="text" name="descriptionShort"><br><br>
        <label for="descriptionLong">Descripción Larga:</label>
        <textarea name="descriptionLong" rows="4"></textarea><br><br>
        <label for="frozen">Disponible:</label>
        <input type="checkbox" name="frozen"><br><br>
        <input type="submit" value="Crear Plato">
    </form>
</body>
</html>
