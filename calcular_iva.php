<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    $precioSinIva = 0;
    $precioConIva = 0;
    $ivaCantidad = 0;

    if($_POST){
        $iva = $_POST["lstIva"];
        $precioConIva = ($_POST["txtPrecioConIva"]) > 0? $_POST["txtPrecioConIva"]: 0;
        $precioSinIva = ($_POST["txtPrecioSinIva"]) > 0? $_POST["txtPrecioSinIva"]: 0;
        
        if($precioSinIva == 0){
            $precioSinIva = $precioConIva / ($iva/100+1);
        }
        if($precioConIva == 0){
            $precioConIva = $precioSinIva * ($iva/100+1);
        }
        $ivaCantidad = $precioConIva - $precioSinIva;
        
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Calcular IVA</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-2">
                <form method="POST">
                    <div class="pb-3">
                        <label for="">
                            IVA
                            <select name="lstIva" id="lstIva" class="form-select">
                                <option value="10.5">10.5</option>
                                <option value="19">19</option>
                                <option value="21" selected>21</option>
                                <option value="27">27</option>
                            </select>
                        </label>
                    </div>
                    <div class="pb-3">
                        <label for="">Precio sin IVA:</label>
                        <input type="text" id="txtPrecioSinIva" name="txtPrecioSinIva" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="">Precio con IVA:</label>
                        <input type="text" id="txtPrecioConIva" name="txtPrecioConIva" class="form-control">
                    </div>
                    <div class="pb-3">
                        <button type="submit" class="btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>
            <div class="col-4 pt-4 offset-1">
                <table class="table table-hover border">
                    <tr>
                        <th>IVA:</th>
                        <td><?php echo $iva ?>%</td>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td>$<?php echo number_format($precioSinIva, 2, ',', '') ?></td>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <td>$<?php echo number_format($precioConIva, 2, ',', '') ?></td>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <td>$<?php echo number_format($ivaCantidad, 2, ',', '') ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>