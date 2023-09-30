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
        <th>Nombre del Plato</th>
        <th>Precio Predeterminado</th>
        <th>Descripción Corta</th>
        <th>Descripción Larga</th>
        <th>Disponible</th>
    </tr>
    @foreach ($plates as $plate)
        <tr>
            <td>{{ $plate->plateName }}</td>
            <td>{{ $plate->defaultPrice }}</td>
            <td>{{ $plate->descriptionShort }}</td>
            <td>{{ $plate->descriptionLong }}</td>
            <td>{{ $plate->frozen ? 'Sí' : 'No' }}</td>
        </tr>
    @endforeach
</table>
