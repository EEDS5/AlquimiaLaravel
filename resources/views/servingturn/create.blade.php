<!DOCTYPE html>
<html>
<head>
    <title>Crear Turno de Servicio</title>
</head>
<body>
    <h1>Crear Turno de Servicio</h1>
    <form method="POST" action="{{ route('servingturn.store') }}">
        @csrf
        <label for="startTime">Hora de Inicio:</label>
        <input type="datetime-local" name="startTime" required><br><br>
        <label for="endTime">Hora de Fin:</label>
        <input type="datetime-local" name="endTime" required><br><br>
        <label for="semester_id">ID del Semestre:</label>
        <input type="number" name="semester_id" required><br><br>
        <label for="descript">Descripción:</label>
        <textarea name="descript" rows="4" cols="50"></textarea><br><br>
        <label for="maxSlots">Máximo de Espacios:</label>
        <input type="number" name="maxSlots" required><br><br>
        <label for="frozen">Disponible:</label>
        <input type="checkbox" name="frozen" value="1"><br><br>
        <input type="submit" value="Crear Turno de Servicio">
    </form>
</body>
</html>
