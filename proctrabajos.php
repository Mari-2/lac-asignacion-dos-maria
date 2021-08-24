<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Procesar</title>
</head>

<body>
    <div class="col-lg-5 mx-auto p-3 py-md-5">
        <main>
            <h2>Datos de experiencia</h2>
            <?php 
                $empresa= $_GET['emp'];
                $inicio= $_GET['inic'];
                $fin= $_GET['fin'];
                $cargo= $_GET['carg'];
                $descripcion= $_GET['desc'];
                echo "$inicio.$fin.$cargo.$descripcion";
                 ?>
        <h4>Nombre de la empresa</h4> <?=$empresa?>
        <hr class="col-sm-5">
        <h4>Fecha de inicio</h4> <?=$inicio?>
        <hr class="col-sm-5">
        <h4>Fecha de salida</h4> <?=$fin?>
        <hr class="col-sm-5">
        <h4>Cargo</h4> <?=$cargo?>
        <hr class="col-sm-5">
        <h4>Descripcion</h4> <?=$descripcion?>
        <hr class="col-sm-5">
            <?php
                

                $file = file_get_contents('experiencia.json');
                $file = json_decode($file);

                $empresas = [
                    'emp' =>$_GET['emp'],
                    'inic' =>$_GET['inic'],
                    'fin' =>$_GET['fin'],
                    'carg' =>$_GET['carg'],
                    'desc' =>$_GET['desc'],
                ];
                $file[] = $empresas;

                $file = json_encode($file);
                file_put_contents('experiencia.json',$file);
            ?>
            <br>
            <a class="btn btn-primary" href="Experienciadetrabajo.html" >Volver</a>
            <a class="btn btn-success" href="experiencialista.php">Ver listas de experiencia</a>
           
            
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</body>

</html> 