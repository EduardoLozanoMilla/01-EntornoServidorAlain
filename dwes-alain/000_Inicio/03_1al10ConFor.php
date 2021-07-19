<?php
    $hastaQueNumero = 4;
?>



<html>

<head></head>

<body>

<ul>

    <?php for ($i = 1; $i <= $hastaQueNumero; $i++) { ?>
        <li><?= $i ?></li>
    <?php } ?>

</ul>

<ul>

    <?php
        for ($i = 1; $i <= $hastaQueNumero; $i++) {
            echo "<li>$i</li>";
        }
    ?>

</ul>

</body>

</html>