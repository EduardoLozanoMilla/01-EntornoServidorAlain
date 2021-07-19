<?php
    if (!isset($_COOKIE["acumulado"]) || isset($_REQUEST["reset"])) {
        $acumulado = 0;
    } else {
        $acumulado = (int) $_COOKIE["acumulado"] + (int) $_REQUEST["sumando"];
    }

    //// TERMINAR LA FUNCION PARA RESTAR
    setcookie("acumulado", $acumulado, time()+30);
?>

<html lang="en">

<form method="get">
    <label for="sumando">introduce el sumando</label>
    <input type="number" id="sumando" name="sumando">

    <input type="submit" name="suma">

    <p > <?=$acumulado?> </p>

    <input type="submit" value="resetear" name="reset">

    <!-- esta es la mejor opcion para resetaear, resetea la url al php original --->
    <a href='<?= $_SERVER["PHP_SELF"] ?>'>Otra manera de resetear</a>
</form>

</html>
