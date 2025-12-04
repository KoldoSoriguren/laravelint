<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>

  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

  <div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="card w-50">
      <div class="card-body">
        <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>

        <form method="POST" action="{{ route('sesion.iniciada') }}">
            @csrf
            

          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
          </div>

          <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>

      
      </div>
    </div>
  </div>

  <!-- Scripts de Bootstrap 4 -->


</body>
</html>
