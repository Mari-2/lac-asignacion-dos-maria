<?php

$file = json_decode(file_get_contents('experiencia.json'));

?>
<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Experiencia</title>
</head>

<body>
    <div class="col-lg-8 mx-auto p-3 py-md-5">
        <main>
            <h2>Datos registrados</h2> 
            <a href="Experienciadetrabajo.html" class="btn btn-success">Volver</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la empresa</th>
                        <th>Fecha de Incio</th>
                        <th>Fecha de Salida</th>
                        <th>Cargo en la empresa</th>
                        <th>Descripcion del trabajo realizado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($file as $key => $reg) :?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $reg->emp?></td>
                            <td><?= $reg->inic?></td>
                            <td><?= $reg->fin?></td>
                            <td><?= $reg->carg?></td>
                            <td><?= $reg->desc?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</body>

</html>