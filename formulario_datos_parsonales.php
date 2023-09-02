<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_POST){
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDni"];
        $tel = $_POST["txtTel"];
        $edad = $_POST["txtEdad"];

        if($nombre == "" || $dni == "" || $tel == "" || $edad == ""){
            $msg = "Porfavor complete todos los datos";
        }
    };

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Formulario datos personales</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="resultado_formulario.php">
                    <div class="pb-3">
                        <label for="">Nombre:*</label><input type="txt" name="txtNombre" id="txtNombre" class="requered form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">DNI:*</label><input type="txt" name="txtDni" id="txtDni" class="requered form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Telefono:*</label><input type="txt" name="txtTel" id="txtTel" class="requered form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Edad:*</label><input type="number" name="txtEdad" id="txtEdad" class="requered form-control">
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>