<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function write_csv($matriz_productos, $ruta_csv){
        if(!file_exists($ruta_csv)){
            file_put_contents($ruta_csv,"");
            $outputBuffer = fopen($ruta_csv, "w");
            foreach($matriz_productos as $n_linea => $linea){
                fputcsv($outputBuffer, $linea, ',', "");
            }
            fclose($outputBuffer);
        }
    }

    if(file_exists("invitados.txt")){
        $archivo = fopen("invitados.txt", "r");
        $aDni = fgetcsv($archivo, 0, ",");
    }else{
        $aDni = array();
    }

    if($_POST){
        if(isset($_POST["btnInvitados"])){
            $documento = $_POST["txtDNI"];
            if(in_array($documento,$aDni)){
                $resp = "Bienvenid@ " . $documento . " a la fiesta!";
            }else{
                $resp2 = "No se encuentra en la lista de invitados.";
            }
        }

        if(isset($_POST["btnVip"])){
            $codigo = $_POST["txtCodigo"];
            if($codigo == "verde"){
                $resp3 = "Su código de acceso es " . rand(1000, 9999);
            }else{
                $resp4 = "UD. no tiene pase VIP";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Lista de invitados</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 p-3">
                <h1>Lista de initados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if(isset($resp)){ ?>
                    <div class="alert alert-success" role="alert"><?php echo $resp ?></div>
                <?php }elseif(isset($resp2)){ ?>
                    <div class="alert alert-danger" role="alert"><?php echo $resp2 ?></div>
                <?php } ?>
                <?php if(isset($resp3)){ ?>
                    <div class="alert alert-success" role="alert"><?php echo $resp3 ?></div>
                <?php }elseif(isset($resp4)){ ?>
                    <div class="alert alert-danger" role="alert"><?php echo $resp4 ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-3">
                <h3>complete el siguiente formuilario:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div>
                        <label for="">Ingrese el DNI:</label>
                    </div>
                    <div class="pt-3">
                        <input type="text" name="txtDNI" id="txtDNI" class="form-control">
                    </div>
                    <div>
                        <button name="btnInvitados" class="btn btn-primary">Verificar invitado</button>
                    </div>
                    <div class="pt-3">
                        <label for="">Ingresa el código secreto para el pase VIP:</label>
                    </div>
                    <div class="pt-3">
                        <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                    </div>
                    <div>
                        <button name="btnVip" class="btn btn-primary">Verficiar código</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>