<?php
session_start();
$acumulado=$_SESSION["acumulado"];
if(!isset($_SESSION["acumulado"]) || isset($_REQUEST["reset"])){
    $acumulado=0;
}elseif(!isset($_REQUEST["sumando"])){
    $_REQUEST["sumando"]=0;
}else{
    $acumulado= (int) $_SESSION["acumulado"] + (int) $_REQUEST["sumando"];
}

$_SESSION["acumulado"]=$acumulado;
//// TERMINAR LA FUNCION PARA RESTAR
?>

<html lang="en">
<form method="get">
    <label for="sumando">introduce el sumando</label>
    <input type="number" id="sumando" name="sumando">
<input type="submit"  name="suma">
    <p > <?=$acumulado?> </p>

    <input type="submit" value="resetear" name="reset">

<!-- esta es la mejor opcion para resetaear, resetea la url al php original --->
    <a href='<?= $_SERVER["PHP_SELF"] ?>'>Otra manera de resetear</a>
</form>


</html>
