<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_POST){

        $usuario = $_POST["txtUsuario"];
        $clave = $_POST["txtClave"];

        if($usuario == "" || $clave == ""){
            $msg = "Usuario o clave incorrecto";
        }else{
            header("Location: acceso-confirmado.php");
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-6 py-5">
                <h1>Formulario de ingreso</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?php if(isset($msg)){ ?>
                    <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
                    <?php } ?>
                <form method="POST" action="">
                    <div>
                        <label for="">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control mb-3">
                    </div>
                    <div>
                        <label for="">Clave:</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control mb-3">
                    </div>
                    <div><button type="submit" name="btnIngresar" class="btn btn-primary">INGRESAR</button></div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>