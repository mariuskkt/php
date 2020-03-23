<?php
/**
 * returns integer value in square
 * @param $x float
 * @return float|int
 */
function square(float $x): float
{
    return $x * $x;
}

$text = 'Iveskite skaiciu';

if (isset($_POST['number']) && $_POST['number'] != '') {
    $text = 'Skaicius kvadratu: ' . square($_POST['number']);
}

var_dump($_POST);

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
    </style>
</head>
<body>
<main>
    <form action="index.php" method="post">
        <label>
            <span>Kokį skaičių pakelti kvadratu: </span>
            <input name="number" type="number" placeholder="skaicius">
        </label>
        <input type="submit">
    </form>
    <h1><?php print $text ?></h1>
</main>
</body>
</html>

