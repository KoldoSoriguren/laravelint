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

    <div class="mb-3 text-end">
        <a href="{{ route('torneos.crear') }}" class="btn btn-primary">Crear Torneo</a>
        @if(!session('user'))
            <a href="{{ route('sesion.iniciar') }}" class="btn btn-secondary">Iniciar Sesión</a>
        @else
            <a href="{{ route('sesion.cerrar') }}" class="btn btn-danger">Cerrar Sesión</a>

        @endif
    </div>

    <table class="table table-striped table-hover table-bordered shadow-sm bg-white">
        <thead class="table-dark">
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
            <tr>
                <td>{{ $torneo->id }}</td>
                <td>{{ $torneo->titulo }}</td>
                <td>{{ $torneo->plazas }}</td>
                <td>{{ $torneo->juego }}</td>
                <td>
                    @if($torneo->estado)
                        <span class="badge bg-success">Abierto</span>
                    @else
                        <span class="badge bg-danger">Cerrado</span>
                    @endif
                </td>
                <td>
                    @if(session('user'))
                            <!-- Botón Abrir / Cerrar -->
                        @if($torneo->estado)
                            <form action="{{ route('torneos.cerrar', $torneo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-warning">Cerrar</button>
                            </form>
                        @else
                            <form action="{{ route('torneos.abrir', $torneo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-success">Abrir</button>
                            </form>
                        @endif                        
                    @endif

                        
                    <!-- Botón Ver -->
                    <a href="{{ route('torneos.show', $torneo->id) }}" class="btn btn-sm btn-info">Ver</a>

                    @if(session('user'))
                        <!-- Botón Eliminar -->
                        <form action="{{ route('torneos.destroy', $torneo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este torneo?')">Eliminar</button>
                        </form>                            

                    @endif

                </td>
            </tr>
            @endforeach



            <form action="{{ route('idioma.cambiar') }}" method="POST">
                @csrf
                <label for="idioma" class="form-label">Cambiar idioma</label>
                <select name="idioma" id="idioma" class="form-select" required>
                    <option value="Euskera">Euskera</option>
                    <option value="Castellano">Castellano</option>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Cambiar</button>

            </form>
        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
