<?php
// Si NO hay formulario enviado (1ª vez), o piden resetear.
    if (!isset($_REQUEST["acumulado"]) || isset($_REQUEST["reset"])) {
        $acumulado = 0;
    } else { // Sí hay formulario enviado (2ª ó siguientes veces).
        $acumulado = (int) $_REQUEST["acumulado"] + 1;
    }

    // INTERFAZ:
    // $acumulado
?>



<html lang="en">

<form method='get'>
    <input type='number' name='acumulado' value='<?=$acumulado?>'>


    <input type='submit' value='+1' name='suma'>

    <br /><br />

<!---- como carga el boton de reset al request "reset" ---->
    <input type='submit' value='Resetear' name='reset'>

    <br /><br />

    <!--- preguntar por este reseteo --->
    <a href='<?= $_SERVER["PHP_SELF"] ?>'>Otra manera de resetear</a>
    <br/><span>(Esta parece la mejor)</span>

</form>

</html>