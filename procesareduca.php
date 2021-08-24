<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Procesar Educacion</title>
</head>

<body>
    <div class="col-lg-5 mx-auto p-3 py-md-5">
        <main>
            <h2>Datos de educacion</h2>
            <?php 

                $instituto= $_GET['inst'];
                $ingreso= $_GET['ingr'];
                $egreso= $_GET['egre'];
                $nivel= $_GET['niv'];
                 
            ?>
        <h4>Nombre del Instituto</h4> <?=$instituto?>
        <hr class="col-sm-5">
        <h4>Fecha de ingreso</h4> <?=$ingreso?>
        <hr class="col-sm-5">
        <h4>Fecha de egreso</h4> <?=$egreso?>
        <hr class="col-sm-5">
        <h4>Carrera</h4> <?=$nivel?>
        <hr class="col-sm-5"> 
            <?php
                

                $file = file_get_contents('educacion.json');
                $file = json_decode($file);

                $institutos = [
                    'inst' =>$_GET['inst'],
                    'ingr' =>$_GET['ingr'],
                    'egre' =>$_GET['egre'],
                    'niv' =>$_GET['niv'],
                ];
                $file[] = $institutos;

                $file = json_encode($file);
                file_put_contents('educacion.json',$file);
            ?>
            <br>
            <a class="btn btn-primary" href="educacion.html" >Volver</a>
            <a class="btn btn-success" href="educacionlista.php">Ver listas de educación</a>
           
            
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</body>

</html> 