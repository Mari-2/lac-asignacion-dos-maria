<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Procesar</title>
</head>

<body>
     <div class="col-lg-5 mx-auto p-3 py-md-5">
        <main>
            <h2>Datos enviados</h2>
            <h4>Nombre: <?=$_GET['nombre']?> <?=$_GET['apellido']?></h4>
            <hr class="col-sm-5">
            <?php 
                $dni = '';
                if(isset($_GET['tipoDni'])){
                    $nac = $_GET['tipoDni'];
                    if($nac == 'V' || $nac == 'E'){
                        $dni .= $nac . '-'. $_GET['ci'];
                    }else{
                        $dni .= 'P' . $_GET['ci'];
                    }
                }
                $date = $_GET['nac'];
                $date = date('d-m', strtotime($date));
                date_default_timezone_set('America/Caracas');
                $today =  date_create('now');
                $nacc =  date_create($_GET['nac']);
                $interval = date_diff($today, $nacc);
                $age = $interval->format('%y');
                $genders = [
                    'm' => 'male',
                    'f' => 'female',
                    'n' => 'transgender-alt',
                    'p' => 'genderless'
                ];
                $gender = $genders[$_GET['genero']] ;
                $empresa= $_GET['emp'];
                $inicio= $_GET['inic'];
                $fin= $_GET['fin'];
                $cargo= $_GET['carg'];
                $descripcion= $_GET['desc'];
                $instituto= $_GET['inst'];
                $ingreso= $_GET['ingr'];
                $egreso= $_GET['egre'];
                $nivel= $_GET['niv'];
            ?>
            <h4>Fecha de nacimiento</h4> <?=$date?>
            <h4>Edad:</h4> <?=$age?>
            <hr class="col-sm-5">
            <h4>Genero</h4>
            <i class="fas fa-<?=$gender?> fa-3x"></i>
            <hr class="col-sm-5">
            <?php 
                if($age >= 10): ?>
            <h4>DNI</h4> <?=$dni?>
            <hr class="col-sm-5">
            <?php endif;?>
            <h4>Teléfono</h4>
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
           <h4>Nombre del Instituto</h4> <?=$instituto?>
           <hr class="col-sm-5">
           <h4>Fecha de ingreso</h4> <?=$ingreso?>
           <hr class="col-sm-5">
           <h4>Fecha de egreso</h4> <?=$egreso?>
           <hr class="col-sm-5">
           <h4>Carrera</h4> <?=$nivel?>
           <hr class="col-sm-5"> 
            <?php
                $code = substr($_GET['tel'],0,4);
                $first = substr($_GET['tel'],4,3);
                $sec = substr($_GET['tel'],7,2);
                $third = substr($_GET['tel'],9,2);
                echo "$code-$first.$sec.$third";

                $file = file_get_contents('persona.json');
                $file = json_decode($file);

                $registrocomp = [
                    'nombre' => $_GET['nombre'].' '.$_GET['apellido'],
                    'dni' => $dni,
                    'fecha_nacimiento' => $_GET['nac'],
                    'genero' => $_GET['genero'],
                    'telefono' => [
                        'tipo' => $_GET['tipoTel'],
                        'numero' => $_GET['tel'],
                        'emp' =>$_GET['emp'],
                    'inic' =>$_GET['inic'],
                    'fin' =>$_GET['fin'],
                    'carg' =>$_GET['carg'],
                    'desc' =>$_GET['desc'],
                    'inst' =>$_GET['inst'],
                    'ingr' =>$_GET['ingr'],
                    'egre' =>$_GET['egre'],
                    'niv' =>$_GET['niv'],
                    ],
                ];
                $file[] = $registrocomp;

                $file = json_encode($file);
                file_put_contents('datosjuntos.json',$file);
               
            ?>
            <br>
                        
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</body>

</html> 