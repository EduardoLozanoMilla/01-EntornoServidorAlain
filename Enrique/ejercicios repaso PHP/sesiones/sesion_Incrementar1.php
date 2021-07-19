<?php
    session_start();

    if (!isset($_SESSION["acumulado"]) || isset($_REQUEST["reset"])) { // Si NO hay formulario enviado (1ª vez), o piden resetear.
        $acumulado = 0;
    } else { // Sí hay datos en la sesión (2ª ó siguientes veces).
        $acumulado = (int) $_SESSION["acumulado"] + 1;
    }

    $_SESSION["acumulado"] = $acumulado;

    // INTERFAZ:
    // $acumulado
?>



<html>

<form method='get'>

    <input type='text' name='acumulado' value='<?=$acumulado?>'>

    <input type='submit' value='+1' name='suma'>

    <br /><br />

    <input type='submit' value='Resetear' name='reset'>

    <br /><br />

    <a href='<?= $_SERVER["PHP_SELF"] ?>'>Otra manera de resetear</a>
    <br/><span>(Esta parece la mejor)</span>

</form>

</html>