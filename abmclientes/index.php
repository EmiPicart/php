<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $aClientes = array();

    if(file_exists("archivo.txt")){
        $jsonClientes = file_get_contents("archivo.txt");

        $aClientes = json_decode($jsonClientes, true);
    }else{
        $aClientes = array();
    }

    $pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";

    if($_POST){
        if(isset($_POST["btnGuardar"])){
            $dni = trim($_POST["txtDni"]);
            $nombre = trim($_POST["txtNombre"]);
            $telefono = trim($_POST["txtTel"]);
            $correo = trim($_POST["txtCorreo"]);
            $nombreImagen = "";

            if($pos >= 0){
                if($_FILES["imagen1"]["error"] == UPLOAD_ERR_OK){
                    $nombreAleatorio = date("Ymdhmsi") . rand(1000,2000);

                    $archivo_temp = $_FILES["imagen1"]["tmp_name"];

                    $extension = strtolower(pathinfo($_FILES["imagen1"]["name"], PATHINFO_EXTENSION));

                    if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                        $nombreImagen = "$nombreAleatorio.$extension";
                        move_uploaded_file($archivo_temp, "imagenes/$nombreImagen");
                    }

                    if($aClientes[$pos]['imagen'] != "" && file_exists("imagenes/" . $aClientes[$pos]['imagen'])){
                        unlink("imagenes/".$aClientes[$pos]["imagen"]);
                    }
                }else{
                    $nombreImagen = $aClientes[$pos]["imagen"];
                }

                $aClientes[$pos] = array("dni" => $dni,
                                "nombre" => $nombre,
                                "telefono" => $telefono,
                                "correo" => $correo,
                                "imagen" => $nombreImagen
                            );
            }else{
                if($_FILES["imagen1"]["error"] == UPLOAD_ERR_OK){
                    $nombreAleatorio = date("Ymdhmsi") . rand(1000,2000);

                    $archivo_temp = $_FILES["imagen1"]["tmp_name"];

                    $extension = strtolower(pathinfo($_FILES["imagen1"]["name"], PATHINFO_EXTENSION));

                    if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
                        $nombreImagen = "$nombreAleatorio.$extension";
                        move_uploaded_file($archivo_temp, "imagenes/$nombreImagen");
                    }
                }

                $aClientes[] = array("dni" => $dni,
                                "nombre" => $nombre,
                                "telefono" => $telefono,
                                "correo" => $correo,
                                "imagen" => $nombreImagen
                            );
            }

            $jsonClientes = json_encode($aClientes);

            file_put_contents("archivo.txt", $jsonClientes);
        }
    }

    if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
        unset($aClientes[$pos]);

        $jsonClientes = json_encode($aClientes);

        file_put_contents("archivo.txt", $jsonClientes);

        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>ABM Clientes</title>
</head>
<body>
    <main class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-5 offset-1">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="">DNI:*</label>
                        <input type="text" id="txtDni" name="txtDni" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Nombre:*</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Teléfono:*</label>
                        <input type="text" id="txtTel" name="txtTel" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Correo:*</label>
                        <input type="mail" id="txtCorreo" name="txtCorreo" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Archivo adjunto <input type="file" name="imagen1" id="imagen1" accept=".jpg, .jpeg, .png" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["imagen"] : ""; ?>"></label>
                        <p>Archivos admitidos: .jpg, .jpeg, .png</p>
                    </div>
                    <div>
                        <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-primary">Guardar</button>
                        <a href="index.php" id="btnNuevo" name="btnNuevo" class="btn btn-danger">Nuevo</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $cliente) : ?>
                            <tr>
                                <td>
                                    <?php if($cliente["imagen"] != ""): ?>
                                        <img src="imagenes/<?php echo $cliente["imagen"] ?>" class="img-thumbnail">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["nombre"] ?></td>
                                <td><?php echo $cliente["correo"] ?></td>
                                <td>
                                    <a href="index.php?pos=<?php echo $pos ?>&do=editar"><i class="bi bi-pencil-square"></i></a>
                                    <a href="index.php?pos=<?php echo $pos ?>&do=eliminar"><i class="bi bi-trash-fill"></i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>