<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    
    if(isset($_SESSION["listadoClientes"])){
        $aClientes = $_SESSION["listadoClientes"];
    }else{
        $aClientes = array();
    }

    if($_POST){
        if(isset($_POST['btnEliminar'])){
            session_destroy();
            $aClientes = array();
        }
        if(isset($_POST['btnEnviar'])){
            $nombre = $_POST["txtNombre"];
            $dni = $_POST["txtDni"];
            $telefono = $_POST["txtTelefono"];
            $edad = $_POST["txtEdad"];

            $aClientes[] = array("nombre" => $nombre,
                                "dni" => $dni,
                                "telefono" => $telefono,
                                "edad" => $edad
            );
            $_SESSION["listadoClientes"] = $aClientes;
        }
        if(isset($_POST['btnBorrar'])){
            $fila_eliminar = $_POST['btnBorrar'];
         }
    }

    if(isset($_GET['pos'])){
       $pos = $_GET['pos'];
       unset($aClientes[$pos]);

       $_SESSION["listadoClientes"] = $aClientes;
       header("Location: clientes_session.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Listado de Clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form method="POST" class="form">
                    <div class="py-2">
                        <label for="">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ingrse nombre y apellido">
                    </div>
                    <div class="py-2">
                        <label for="">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="py-2">
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">Enviar</button>
                        <button type="submit" name="btnEliminar" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
            <div class="col-6 offset-2">
                <table class="table table-hover border shadow">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Telefono:</th>
                            <th>Edad:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $cliente): ?>
                            <tr>
                                <td><?php echo $cliente["nombre"] ?></td>
                                <td><?php echo $cliente["dni"] ?></td>
                                <td><?php echo $cliente["telefono"] ?></td>
                                <td><?php echo $cliente["edad"] ?></td>
                                <td><a href="clientes_session.php?pos=<?php echo $pos ?>"><i class="bi bi-trash-fill"></i></a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>