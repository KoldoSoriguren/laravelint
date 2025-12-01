<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Torneos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Lista de Torneos</h1>

    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Plazas</th>
                <th>Guego</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($var as $torneo)
            <tr>
                <td>{{ $torneo->id }}</td>
                <td>{{ $torneo->titulo }}</td>
                <td>{{ $torneo->plazas }}</td>
                <td>{{ $torneo->juego }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver mas</a>
                    <a href="#" class="btn btn-sm btn-warning">Cerrar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
