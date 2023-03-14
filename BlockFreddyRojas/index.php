<?php

$error = '';


if (isset($_POST['crear']) &&  isset($_POST['nombre'])) {


    $nombre = $_POST['nombre'];
    $dirname = "file/$nombre";

    try {

        if (!(is_dir($dirname))) {

            mkdir($dirname);
            $error = 'Directorio creado';
        } else {
            $error = '';
        }
    } catch (Exception $e) {
        echo 'Error: ',  $e->getMessage(), "\n\n";
    }
}



unset($_POST['crear']);
unset($_POST['nombre']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Rubik+Glitch&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Puddles&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Block de notas Freddy Rojas</title>
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
<div class="container">
    <a class="navbar-brand" href="index.php">Bienvenido</a>
  </div>
</nav>

<div class="w-50 mx-auto d-block ">


    <h1> BLOC DE NOTAS DE CANCIONES FAVORITAS</h1>

    
    <div class="creating" id="creating">
        <form action="index.php" method="post">
            <input type="text" name="nombre" styles="padding: 2px 4px 2px 4px">
            <button type="submit" class="btn-success" name="crear" value="crear" styles="margin-left: 20px;">Crear directorio</button>
        </form>
        <br>
    </div>

</div>
<hr>
    <div class="row row-cols-4 w-75 mx-auto">




    <?php
    try {

        $dir = 'file';
        $dirs  = scandir($dir);



        foreach ($dirs as $direc) {
            if ('.' !== $direc && '..' !== $direc) {

    ?>



                <div class="col">
                    <div class="card m-4" style="width: auto; height:auto">
                        <div class="card-body">
                            <h5 class="card-title"> <b><?php echo  $direc ?>  </b> </h5>
                            <a href="directorio.php?dir=<?php echo $direc ?>" class="card-link">Ver</a>
                            <a href="procesos/delete.php?dir=<?php echo $direc ?>" class="card-link text-danger">Eliminar</a>
                        </div>
                    </div>
                </div>

    <?php
            }
        }
    } catch (Exception $e) {
        echo 'Se ha encontrado un error: ',  $e->getMessage(), "\n\n";
    }
    ?>
    </div>

</body>

</html>