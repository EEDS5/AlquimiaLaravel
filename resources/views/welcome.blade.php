<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Restaurante Escuela UDI by Dossier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        section {
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Restaurante Escuela UDI by Dossier</h1>
    <nav>
        <ul>
            <li><a href="{{ route('client.create') }}">Crear cliente</a></li>
            <li><a href= "{{ route('client.store') }}">Ver cliente</a></li>
            <li><a href= "{{ route('plate.create') }}">Crear platos</a></li>
            <li><a href="{{ route('plate.store') }}">Ver platos</a></li>
            <li><a href="{{ route('semester.create') }}">Crear semestre</a></li>
            <li><a href="{{ route('semester.store') }}">Ver semestre</a></li>
            <li><a href="{{ route('servingturn.create') }}">Crear turno de servicio</a></li>
            <li><a href="{{ route('servingturn.store') }}">Ver turno de servicio</a></li>
            <li><a href="{{ route('reservation.create') }}">Crear reserva</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav>
</header>

<section id="inicio">
    <h2>¡Bienvenido a Restaurante Escuela UDI by Dossier!</h2>
    <p>Disfruta de la mejor comida en un ambiente acogedor.</p>
</section>

<section id="menu">
    <h2>Nuestro Menú</h2>
    <ul>
        <li><strong>Entradas</strong></li>
        <li><strong>Platos Principales</strong></li>
        <li><strong>Postres</strong></li>
    </ul>
</section>

<section id="reservas">
    <h2>Reserva una Mesa</h2>
    <p>Para hacer una reserva, por favor llámanos al: (123) 456-7890.</p>
</section>

<section id="contacto">
    <h2>Contacto</h2>
    <address>
        <p>Dirección: 123 Calle Principal, Ciudad</p>
        <p>Teléfono: (123) 456-7890</p>
        <p>Email: <a href="mailto:info@restaurantedelicioso.com">info@restaurantedelicioso.com</a></p>
    </address>
</section>

<footer>
    <p>&copy; 2023 Restaurante Escuela UDI by Dossier. Todos los derechos reservados.</p>
</footer>

</body>
</html>