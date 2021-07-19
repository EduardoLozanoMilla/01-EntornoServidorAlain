<?php
///Si  viene la COOKIE "oculto", la ELIMINA
if (isset($_COOKIE["oculto"])){setcookie("oculto", "", time()-24*3600);}
///Si viene la COOKIE "numIntentos", la variable $numINtentos captura su valor.
if(isset($_COOKIE["numIntentos"])){
    $numItentos=$_COOKIE["numIntentos"];
}
///Si $numIntentos es menor que 5, avisa de haber tocado donde no debiamos y ELIMINA la COOKIE.
if ($numItentos>=1 && $numItentos<=4) {
    echo "<p>La COOKIE de intentos estaba rellena, no toques donde no debes</p>";
    setcookie("numIntentos", "", time()-24*3600);

    ///Si el numero de intentos es igual o mayor a 5 avisa de ello y elimina la COOKIE.
} else if ($numItentos >=5) {
    echo "<p>Has superado el número máximo de 5 intentos</p>";
    setcookie("numIntentos", "", time()-24*3600);
}
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

<h1>ADIVINAR EL NÚMERO</h1>



<p>Jugador 1: Introduce un número:</p>

<form action="cookie_AdivinarPrincipal.php" method="post">
    <input type="number" name="oculto" />
    <input type="submit" value="Guardar oculto" />
</form>

</body>

</html>