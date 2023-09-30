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
        <th>ID del Semestre</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Finalización</th>
        <th>Congelado</th>
        <th>Fecha de Creación</th>
        <th>Fecha de Actualización</th>
    </tr>
    @foreach ($semesters as $semester)
        <tr>
            <td>{{ $semester->id }}</td>
            <td>{{ $semester->dateStart }}</td>
            <td>{{ $semester->dateEnd }}</td>
            <td>{{ $semester->frozen ? 'Sí' : 'No' }}</td>
            <td>{{ $semester->created_at }}</td>
            <td>{{ $semester->updated_at }}</td>
        </tr>
    @endforeach
</table>
