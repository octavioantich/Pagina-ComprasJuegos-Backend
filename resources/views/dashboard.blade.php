<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Taco Gaming</title>
    <!-- Importa los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="data:image/jpeg;base64,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"/>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <image src="https://cdn-icons-png.flaticon.com/512/102/102644.png" width="40" height="40">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="/profile">Perfil</a>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link" type="submit" style="border:none; background:none;">Log Out</a>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Contenido -->

    <h1 style="color:blue; text-align:center;"> Taco Gaming </h1>
    
    <div class="container mt-5" style="height: 500px;">
  <div class="row">
    <div class="col-md-3 mb-5">
      <div class="card" style="height: 400px">
        <image src="https://img.freepik.com/free-vector/joystick-game-sport-technology_138676-2045.jpg?w=740&t=st=1683510468~exp=1683511068~hmac=52c9ddc36ca72a38eab46a46e4d9d9e161db213469c00da1119d55545b0acea4" style="width: 100%; height: 60%; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Juegos</h5>
          <p class="card-text">Ver los juegos a la venta</p>
          <div class="text-center">
            <a href="/juegos" class="btn btn-primary">Ir a Juegos</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-5">
      <div class="card" style="height: 400px">
        <image src="https://img.freepik.com/premium-vector/set-video-game-icon_7505-311.jpg?w=740" style="width: 100%; height: 60%; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Categorias</h5>
          <p class="card-text">Ver categorias disponibles</p>
          <div class="text-center">
            <a href="/categorias" class="btn btn-primary">Ir a Categorias</a>
          </div>
        </div>
      </div>
    </div>
    @if(auth()->user()->userType !== 'gameMaintenance')
    <div class="col-md-3 mb-5">
      <div class="card" style="height: 400px">
        <image src="https://as1.ftcdn.net/v2/jpg/02/93/92/34/1000_F_293923439_JKrlAnwJi6aMPtO9hLSFTUYHiejuS4Ic.jpg" style="width: 100%; height: 60%; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Desarrolladores</h5>
          <p class="card-text">Ver desarrolladores registrados</p>
          <div class="text-center">
            <a href="/desarrolladores" class="btn btn-primary">Ir a Desarrolladores</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-5">
      <div class="card" style="height: 400px">
        <image src="https://img.freepik.com/vector-gratis/disenos-elementos-compra_1284-557.jpg?w=740&t=st=1683513715~exp=1683514315~hmac=a8e9f2449ceea15d40b0daaaaff0898b9a70feb47b9e91338258341618531141" style="width: 100%; height: 60%; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">Compras</h5>
          <p class="card-text">Ver compras realizadas</p>
          <div class="text-center">
            <a href="/compras" class="btn btn-primary">Ir a Compras</a>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>



    <!-- Importa los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>