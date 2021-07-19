<?php

session_start();
    
    /*
        Hacemos el error con prevision de que en el formulario pudieran pedirse mas campos.
    */
    $error = Array('texto' => '');

    $texto = '';
    
    if(isset($_POST['Enviar'])){
        if(!empty($_POST['texto'])){
            $texto = $_POST['texto'];
            $_SESSION['texto'] = $texto;
        } else {
            $error['texto'] = "<strong style = 'color:red; font-size:30px;'> Mete un texto lebrel </strong>";
        } 
    }

    if(isset($_POST['Anexar'])){
        $textoAnexar = $_POST['textoAnexar'];
        $_SESSION['texto'] = $_SESSION['texto']." " . $textoAnexar;
    }

    if(isset($_POST['Reiniciar'])){
        $texto = "";
        $_SESSION['texto'] = "";

        header("location: indexAnexarTexto.php");
    }

    if(isset($_POST['Cerrar Sesion'])){
        session_destroy();
    }



?>




<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AnexarTexto</title>
    </head>

    <body>

        <h1>Anexar texto</h1>

        <form action="indexAnexarTexto.php" method="POST">

            <?php echo $error['texto'] . "<br><br>" ?>

            <label for="texto">Anexar Texto:
                
            </label> <br> <br>
            
            <input type="text" name="texto" class="form-control <?php if($error['texto'] != ''){
                echo 'border border-danger';
            } ?>" value="<?php echo $_SESSION['texto'] ?>"> <br> 

            <input type="submit" name="Enviar" value="Enviar"> <br><br>

            <input type="text" name="textoAnexar" class="form-control" value=""> <br>
            <input type="submit" name="Anexar" value="Anexar"> <br><br>

            <input type="submit" name="Reiniciar" value="Reiniciar"> <br>

            <input type="submit" name="Cerrar Sesion" value="Cerrar Sesion">

    </form>
    </body>
</html>