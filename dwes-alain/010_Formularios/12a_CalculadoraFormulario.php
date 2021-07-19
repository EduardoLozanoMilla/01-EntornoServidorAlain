<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Formulario</title>
</head>

<body>

<h1>Calculadora</h1>

<form action="12b_CalculadoraResultado.php">
    <p><input type="number" name="operando1"></p>

    <select name="codigoOperacion">
        <option value="sum">Suma</option>
        <option value="res">Resta</option>
        <option value="mul">Multiplicación</option>
        <option value="div">Division</option>
    </select>

    <p><input type="number" name="operando2"></p>

    <p><input type="submit" value="Enviar"></p>
</form>

</body>

</html>