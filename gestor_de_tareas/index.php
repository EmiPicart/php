<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(file_exists("archivo.txt")){
        $jsonTareas = file_get_contents("archivo.txt");

        $aTareas = json_decode($jsonTareas, true);
    }else{
        $aTareas = array();
    }

    $pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"]: "";

    if($_POST){
        if(isset($_POST["btnEnviar"])){
            $prioridad = $_POST["lstPrioridad"];
            $usuario = $_POST["ltsUsuario"];
            $estado = $_POST["lstEstado"];
            $titulo = $_POST["txtTitulo"];
            $descripcion = $_POST["txtDescripcion"];
            $fecha = date("Y-m-d");

            if($pos >= 0){
                $aTareas[$pos] = array("prioridad" => $prioridad,
                                        "usuario" => $usuario,
                                        "estado" => $estado,
                                        "titulo" => $titulo,
                                        "descripcion" => $descripcion,
                                        "fecha" => $fecha
                                    );
            }

            $aTareas[] = array("prioridad" => $prioridad,
                                "usuario" => $usuario,
                                "estado" => $estado,
                                "titulo" => $titulo,
                                "descripcion" => $descripcion,
                                "fecha" => $fecha
                            );

            $jsonTareas = json_encode($aTareas);

            file_put_contents("archivo.txt", $jsonTareas);
        }
    }

    if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
        unset($aTareas[$pos]);

        $jsonTareas = json_encode($aTareas);

        file_put_contents("archivo.txt", $jsonTareas);

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
    <title>Gestor de Tareas</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-5">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <form action="" method="post" class="row g-3">
            <div class="col-4">
                    <label for="prioridad">Prioridad</label>
                    <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                        <option disabled selected>Seleccionar</option>
                        <option value="Baja" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["prioridad"] == "Baja" ? "selected" : "" ?>>Baja</option>
                        <option value="Media" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["prioridad"] == "Media" ? "selected" : "" ?>>Media</option>
                        <option value="Alta" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["prioridad"] == "Alta" ? "selected" : "" ?>>Alta</option>
                    </select>
            </div>
            <div class="col-4">
                    <label for="usuario">Usuario</label>
                    <select name="lstUsuario" id="ltsUsuario" class="form-control" required>
                        <option disabled selected>Seleccionar</option>
                        <option value="Ana" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["usuario"] == "Ana" ? "selected" : "" ?>>Ana</option>
                        <option value="Bernabe" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["usuario"] == "Bernabe" ? "selected" : "" ?>>Bernabé</option>
                        <option value="Daniela" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["usuario"] == "Daniela" ? "selected" : "" ?>>Daniela</option>
                    </select>
            </div>
            <div class="col-4">
                    <label for="estado">Estado</label>
                    <select name="lstEstado" id="lstEstado" class="form-control" required>
                        <option disabled selected>Seleccionar</option>
                        <option value="Sin asignar" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "Sin asignar" ? "selected" : "" ?>>Sin asignar</option>
                        <option value="Asignado" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "Asignado" ? "selected" : "" ?>>Asignado</option>
                        <option value="En proceso" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "En proceso" ? "selected" : "" ?>>En proceso</option>
                        <option value="Terminado" <?php echo isset($aTareas[$pos]) && $aTareas[$pos]["estado"] == "Terminado" ? "selected" : "" ?>>Terminado</option>
                    </select>
            </div>
            <div class="col-12">
                <label for="">Título</label>
                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?php echo isset($aTareas[$pos])? $aTareas[$pos]["titulo"] : "" ?>" required>
            </div>
            <div class="col-12">
                <textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="3" class="form-control" placeholder="<?php echo isset($aTareas[$pos])? $aTareas[$pos]["descripcion"] : "" ?>" required></textarea>
            </div>
            <div class="col-12 text-center pb-3">
                <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary">ENVIAR</button>
                <a href="index.php" class="btn btn-secondary">CANCELAR</a>
            </div>
        </form>
        <?php if(count($aTareas)): ?>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de inserción</th>
                                <th>Título</th>
                                <th>Prioridad</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($aTareas as $pos => $tarea) : ?>
                                <tr>
                                    <td><?php echo $pos ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($tarea["fecha"])) ?></td>
                                    <td><?php echo $tarea["titulo"] ?></td>
                                    <td><?php echo $tarea["prioridad"] ?></td>
                                    <td><?php echo $tarea["usuario"] ?></td>
                                    <td><?php echo $tarea["estado"] ?></td>
                                    <td>
                                        <a href="index.php?pos=<?php echo $pos ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                        <a href="index.php?pos=<?php echo $pos ?>&do=eliminar" class="btn btn-danger"><i class="bi bi-trash-fill"></i></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>