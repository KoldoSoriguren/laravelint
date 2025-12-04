<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Torneo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header text-center bg-primary text-white">
            <h2>{{ $torneo->titulo }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Juego:</strong> {{ $torneo->juego }}</p>
            <p><strong>Plazas:</strong> {{ $torneo->plazas }}</p>
            <p>
                <strong>Estado:</strong> 
                @if($torneo->estado)
                    <span class="badge bg-success">Abierto</span>
                @else
                    <span class="badge bg-danger">Cerrado</span>
                @endif
            </p>
            <p><strong>Descripción:</strong> {{ $torneo->descripcion ?? 'Sin descripción' }}</p>
        </div>
       
        <div class="card-footer d-flex justify-content-between">
            @if(session('user'))
            @if($torneo->estado)
                <form action="{{ route('torneos.cerrar', $torneo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-warning">Cerrar Torneo</button>
                </form>
            @else
                <form action="{{ route('torneos.abrir', $torneo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success">Abrir Torneo</button>
                </form>
            @endif


            @endif
            <!-- Botón Abrir/Cerrar -->
            

            <!-- Botón Eliminar -->
            <form action="{{ route('torneos.destroy', $torneo->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este torneo?')">Eliminar</button>
            </form>

            <!-- Volver -->
            <a href="{{ route('torneos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
