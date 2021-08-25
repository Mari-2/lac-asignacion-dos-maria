<?php

$file = json_decode(file_get_contents('persona.json'));

function telFormat($tel)
{
    $code = substr($tel->numero, 0, 4);
    $first = substr($tel->numero, 4, 3);
    $sec = substr($tel->numero, 7, 2);
    $third = substr($tel->numero, 9, 2);
    $tipo = $tel->tipo == 'M' ? 'Movil' : 'Fijo';
    return "$tipo $code-$first.$sec.$third";
}
function genero($gender)
{
    $genders = [
        'm' => 'male',
        'f' => 'female',
        'n' => 'transgender-alt',
        'p' => 'genderless'
    ];
    return $genders[$gender];
}

function edad($nac){
    $date = $nac;
    $date = date('d-M', strtotime($date));
    date_default_timezone_set('America/Caracas');
    $today =  date_create('now');
    $nacc =  date_create($nac);
    $interval = date_diff($today, $nacc);
    return [$interval->format('%y'),$date];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Registro de datos</title>
</head>

<body>
    <div class="col-lg-8 mx-auto p-3 py-md-5">
        <main>
            <h2>Datos registrados</h2> 
            <a href="datospersonas.html" class="btn btn-success">Registro</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Edad</th>
                        <th>Genero</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($file as $key => $reg) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $reg->nombre ?></td>
                            <td><?= $reg->dni ?></td>
                            <td><?= edad($reg->fecha_nacimiento)[1] ?></td>
                            <td><?= edad($reg->fecha_nacimiento)[0] ?></td>
                            <td><i class="fas fa-<?= genero($reg->genero) ?>"></i></td>
                            <td><?= telFormat($reg->telefono) ?></td>
                            <td>  <a href='.$filas[].> <button type='button class='btn btn-success'>Modificar</button> </a> </td>
                            <td> <a href='borrarregistro.php?no=.$filas[];><button type='button class='btn btn-danger'>Eliminar</button></a>
                         </td>
                         <td>  <a href="datosjuntos.php" class="btn btn-success">Curriculum</a></td>
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