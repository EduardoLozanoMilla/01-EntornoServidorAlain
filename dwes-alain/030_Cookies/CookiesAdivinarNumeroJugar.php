<?php
    if (isset($_REQUEST["oculto"])) { // Primera vez con el formulario
        $oculto = (int) $_REQUEST["oculto"];
        $intento = null;
        $numIntentos = 0;
    } else if (!isset($_COOKIE["oculto"])) { // Querian continuar, pero no hay cookie; no se puede
        header("Location: CookiesAdivinarNumeroInicio.php");
        exit;
    } else if (isset($_REQUEST["intento"])) { // Segunda y siguientes veces con "$intento"
        $oculto = (int) $_COOKIE["oculto"];
        $intento = (int) $_REQUEST["intento"];
        $numIntentos = (int) $_COOKIE["numIntentos"] + 1;
    } else { // Querian continuar y es posible porque hay cookie
        $oculto = (int) $_COOKIE["oculto"];
        $intento = null;
        $numIntentos = (int) $_COOKIE["numIntentos"];
    }

    setcookie("oculto", $oculto, time() + 30);
    setcookie("numIntentos", $numIntentos, time() + 30);
?>



<html>

<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8" />
</head>

<body>

<h1>ADIVINAR EL NÚMERO CON COOKIES</h1>

<?php
    if ($intento == null) {
        // No informamos de nada, el juego acaba de empezar.
    } else if($intento < $oculto) {
        echo "<p>El número que buscas es mayor.</p>";
    } else if($intento > $oculto) {
        echo "<p>El número que buscas es menor.</p>";
    } else {
        echo "<p>Has adivinado el número. Era $oculto.</p>";
    }

    if ($intento != $oculto) {
?>

<h3>Jugador 2: Adivina el número. Llevas <?= $numIntentos ?> intento(s).</h3>

<form method = "post">
    <input type = "number" name = "intento">
    <input type = "submit" value = "Intentar">
</form>

<?php } ?>

</body>

</html>