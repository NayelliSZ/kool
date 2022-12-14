<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;1,400&family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@300;600&family=Lora:ital,wght@0,600;1,400&family=Spartan:wght@300;600&display=swap" rel="stylesheet">

    <title>Acceso SIFESC</title>


    <style>
            .bg {
          background-image: url(imagen.jpeg);
          background-position: 100% 100%;
          background-size: cover;
        }
    </style>

  </head>


  <body>
    <section>
      <div class="row g-0 align-items-stretch">

        <div class="col-lg-7 bg d-none d-lg-block d-flex justify-content-between">
          <!--
          <img src="img/UNAM_Fondo.jpg" class="img-profile">
          -->
        </div>


        <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
          <div class="px-lg-5 pt-lg-4 p-4 w-100 align-self-center mb-4">
            <h1 class="mb-4">Bienvenido</h1>
            <form>
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label font-weight-bold">Correo</label>
                <input type="email" class="form-control" placeholder="Ingresa tu correo" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                <input type="password" class="form-control mb-2" placeholder="Ingresa tu contraseña" id="exampleInputPassword1">
                <a href="#" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
              </div>
              <button type="button" class="btn btn-primary w-100" onclick="window.location.href='./vistas/inicio.php'">Iniciar sesión</button>
            </form>
          </div>
           <div class="px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
           </div>
        </div>
      </div>
    </section>
  </body>
</html>
