<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function promediar($aNumeros){
        $suma = 0;
        foreach($aNumeros as $numero){
            $suma += $numero;
        }
        return $suma / count($aNumeros);
    }

    $aEstudiantes = array();
    $aEstudiantes[] = array("nombre" => "Ana Valle", "notas" => array(7, 8));
    $aEstudiantes[] = array("nombre" => "Bernabe Paz", "notas" => array(5, 7));
    $aEstudiantes[] = array("nombre" => "Sebastian Aguirre", "notas" => array(6, 9));
    $aEstudiantes[] = array("nombre" => "Monica Ledesma", "notas" => array(8, 9));

    /*print_r($aEstudiantes);
    exit;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Actas</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aEstudiantes as $estudiante){ ?>
                            <tr>
                                <td><?php echo $estudiante["nombre"] ?></td>
                                <td><?php echo $estudiante["notas"][0] ?></td>
                                <td><?php echo $estudiante["notas"][1] ?></td>
                                <td><?php echo promediar($estudiante["notas"]) ?></td>
                            </tr>
                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>El promedio de la cursada es: <?php Promediar($aEstudiantes["notas"]) ?>
                </p>
            </div>
        </div>
    </main>
</body>
</html>