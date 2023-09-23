<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
</style>

<table>
    <tr>
        <th>ID del Turno</th>
        <th>Hora de Inicio</th>
        <th>Hora de Finalización</th>
        <th>ID del Semestre</th>
        <th>Descripción</th>
        <th>Máximo de Espacios</th>
        <th>Congelado</th>
        <th>Fecha de Creación</th>
        <th>Fecha de Actualización</th>
    </tr>
    @foreach ($servingTurns as $servingTurn)
        <tr>
            <td>{{ $servingTurn->id }}</td>
            <td>{{ $servingTurn->startTime }}</td>
            <td>{{ $servingTurn->endTime }}</td>
            <td>{{ $servingTurn->semester_id }}</td>
            <td>{{ $servingTurn->descript }}</td>
            <td>{{ $servingTurn->maxSlots }}</td>
            <td>{{ $servingTurn->frozen ? 'Sí' : 'No' }}</td>
            <td>{{ $servingTurn->created_at }}</td>
            <td>{{ $servingTurn->updated_at }}</td>
        </tr>
    @endforeach
</table>
