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
        <th>Nombre Completo</th>
        <th>Teléfono</th>
        <th>Correo Electrónico</th>
    </tr>
    @foreach ($clients as $client)
        <tr>
            <td>{{ $client->fullName }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->email }}</td>
        </tr>
    @endforeach
</table>
