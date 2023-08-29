<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $aProductos = array();
    $aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
    );
    $aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
    );
    $aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
    );
    $aProductos[] = array("nombre" => "Parlante JBL Go Essential portátil",
    "marca" => "JBL",
    "modelo" => "Go Essential",
    "stock" => 35,
    "precio" => 27000
    );

    //print_r($aProductos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Sumar Total</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sumatoriaPrecios = 0;
                            for($contador = 0 ; $contador < count($aProductos) ; $contador++){ 
                                $sumatoriaPrecios += $aProductos[$contador]["precio"];
                                ?>
                            <tr>
                                <td><?php echo $aProductos[$contador]["nombre"] ?></td>
                                <td><?php echo $aProductos[$contador]["marca"] ?></td>
                                <td><?php echo $aProductos[$contador]["modelo"] ?></td>
                                <td><?php echo $aProductos[$contador]["stock"] > 10 ? "Hay stock" : ($aProductos[$contador]["stock"] <= 0 ? "No hay stock" : "Poco stcok") ?></td>
                                <td><?php echo $aProductos[$contador]["precio"] ?></td>
                                <td><a class="btn btn-primary">Comprar</a></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>La suma de precio es: $<?php echo $sumatoriaPrecios ?></h2>
            </div>
        </div>
    </div>
</body>
</html>