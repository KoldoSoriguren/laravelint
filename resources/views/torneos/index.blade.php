<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Torneos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

@php
    $idioma = Cookie::get('idioma');
@endphp

<div class="container mt-5">

    <h1 class="mb-4 text-center">Lista de Torneos</h1>

    <!-- Botones superiores -->
    <div class="d-flex justify-content-between mb-4">
      
        <div>
            @if(!session('user'))
             
                <a href="{{ route('sesion.iniciar') }}" class="btn btn-secondary">Iniciar Sesión</a>
            @else
                <a href="{{ route('torneos.crear') }}" class="btn btn-primary">Crear Torneo</a>
                <a href="{{ route('sesion.cerrar') }}" class="btn btn-danger">Cerrar Sesión</a>
            @endif
        </div>
    </div>

    <!-- Tabla en card -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-dark text-center">
                    <tr>
                        @if ($idioma == 'Euskera')
                            <th>ID</th>
                            <th>Izenburua</th>
                            <th>Plazak</th>
                            <th>Jokoa</th>
                            <th>Egoera</th>
                            <th>Ekintzak</th>
                        @else
                            <th>ID</th>
                            <th>Título</th>
                            <th>Plazas</th>
                            <th>Juego</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($var as $torneo)
                    <tr class="text-center">
                        <td>{{ $torneo->id }}</td>
                        <td>{{ $torneo->titulo }}</td>
                        <td>{{ $torneo->plazas }}</td>
                        <td>{{ $torneo->juego->nombre }}</td>
                        <td>
                            @if($torneo->estado)
                                <span class="badge bg-success">Abierto</span>
                            @else
                                <span class="badge bg-danger">Cerrado</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center gap-1">
                            @if(session('user'))
                                @if($torneo->estado)
                                    <form action="{{ route('torneos.cerrar', $torneo->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-warning">Cerrar</button>
                                    </form>
                                @else
                                    <form action="{{ route('torneos.abrir', $torneo->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-success">Abrir</button>
                                    </form>
                                @endif
                            @endif

                            <a href="{{ route('torneos.show', $torneo->id) }}" class="btn btn-sm btn-info text-white">Ver</a>

                            @if(session('user'))
                                <form action="{{ route('torneos.destroy', $torneo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este torneo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Formulario de idioma -->
            <div class="mt-4">
                <form action="{{ route('idioma.cambiar') }}" method="POST" class="d-flex gap-2 align-items-center">
                    @csrf
                    <label for="idioma" class="mb-0">Cambiar idioma:</label>
                    <select name="idioma" id="idioma" class="form-select w-auto" required>
                        <option value="Euskera">Euskera</option>
                        <option value="Castellano">Castellano</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Cambiar</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
