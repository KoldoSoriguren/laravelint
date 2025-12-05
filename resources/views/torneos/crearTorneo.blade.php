<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <form action="{{ route('torneos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="plazas" class="form-label">Plazas</label>
            <input type="number" name="plazas" id="plazas" class="form-control" value="{{ old('plazas') }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="juego" class="form-label">Juego</label>
            <select name="juego_id" id="juego" class="form-select" required>
                @foreach($var as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="abierto" {{ old('estado') == 'abierto' ? 'selected' : '' }}>Abierto</option>
                <option value="cerrado" {{ old('estado') == 'cerrado' ? 'selected' : '' }}>Cerrado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>

        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('torneos.index') }}" class="btn btn-secondary">Volver</a>
            <button type="submit" class="btn btn-primary">Crear Torneo</button>
        </div>
    </form>
    
</body>
</html>