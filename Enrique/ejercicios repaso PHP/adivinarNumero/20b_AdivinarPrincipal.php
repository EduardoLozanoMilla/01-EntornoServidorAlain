<?php

$oculto = (int) $_REQUEST["oculto"];
//$vidas = (int) $_REQUEST["vidas"];

    if (!isset($_REQUEST["intento"])) { // Primera vez. Solo viene oculto.
        $intento = null;

        $numIntentos = 0;

    } else { // Resto de veces. Vienen todos los datos.

        $intento = (int)$_REQUEST["intento"];

        $numIntentos = (int)$_REQUEST["numIntentos"] + 1;

        // Esto del logaritmo no es importante. Es solo una manera de que
        // no salga 1.000.000 de asteriscos si hacen un intento de "1000000".
        $numAsteriscos = 1 + log(abs($intento - $oculto), 1.5);
        $stringCercania = "";
        for ($i = 1; $i <= $numAsteriscos; $i++) {
            $stringCercania = $stringCercania . "*";
        }

    }

    //// Limite Maximo de numero de intentos
    if ($numIntentos==5) {
        echo "<p>Has superado el número máximo de intentos</p>";
        $_SERVER["PHP_SELF"];
    }

    // INTERFAZ:
    // $oculto
    // $intento
    // $numAsteriscos
    // $stringCercania
?>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

<h1>ADIVINA EL NÚMERO</h1>


<?php

    if ($intento == null) {
        // No informamos de nada, el juego acaba de empezar.
    } elseif ($intento < $oculto) {
        echo "<p>El número oculto es mayor ($stringCercania)</p>";
    } elseif ($intento > $oculto) {
        echo "<p>El número oculto es menor ($stringCercania)</p>";
    } else {
        echo "<p>¡Has adivinado el número!El numero era, $oculto. Numero de intentos: $numIntentos .</p>";
    }

    //////////  Contador de VIDAS /////////////////
$vidas=200;
$vidasPerdidas = $oculto-$intento;
if (!isset($_REQUEST["intento"])) { // Primera vez. Solo viene oculto.
$intento = null;

}elseif ($intento != $oculto && $vidasPerdidas >=1 && $vidasPerdidas <=10) {

    $vidas = $vidas-10;

}elseif($intento != $oculto && $vidasPerdidas >=11 && $vidasPerdidas <=20){
    $vidas= $vidas-20;

}elseif($intento != $oculto && $vidasPerdidas >=21){
    $vidas= $vidas-40;
}



    if ($intento != $oculto) {

?>

        <form method="post">
            <p>Jugador 2: Adivina el número (llevas <?= $numIntentos ?> intentos).</p>
            <p > Número de vidas <?= $vidas?></p>
            <input type="hidden" name="oculto" value="<?= $oculto ?>">
            <input type="hidden" name="numIntentos" value="<?= $numIntentos ?>">
            <input type="hidden" name="vidas" value="<?= $vidas ?>">

            <input type="number" name="intento">
            <input type="submit" value="Intentar">
        </form>

<?php
    }
?>

</body>

</html>