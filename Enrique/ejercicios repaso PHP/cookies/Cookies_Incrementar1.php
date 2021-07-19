<?php
// Si NO hay formulario enviado (1ª vez), o piden resetear.
if (!isset($_COOKIE["acumulado"]) || isset($_REQUEST["reset"])) {
    $acumulado = 0;
} else { // Sí hay formulario enviado (2ª ó siguientes veces).
    $acumulado = (int) $_COOKIE["acumulado"] + 1;
}

setcookie("acumulado", $acumulado, time()+30);
?>



<html>

<p><?=$acumulado?></p>

<a href='<?= $_SERVER["PHP_SELF"] ?>'>+1</a><br><br>

<a href='<?= $_SERVER["PHP_SELF"] ?>?reset'>Reset</a>

</html>