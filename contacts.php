<?php
$danielius = '+3706' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
$gintare = '+3706' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
$nerijus = '+3706' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
$marius = '+3706' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contacts</title>
        <link rel="stylesheet" type="text/css" href="/style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="menu">
                <a href="index.php">INDEX</a>
                <a href="kiausrakulas.php">KIAUŠRAKULAS</a>
                <a href="ABOUT">ABOUT</a>
                <a class="current" href="contacts.php">CONTACT</a>
            </nav>
        </header>
        <main>
            <h1 class = "">Mikepukuotukas ir jo draugai</h1>
            <div class="numbers">
                <ul>
                    <li>Danielius <?php print $danielius; ?></li>
                    <li>Gintare <?php print $gintare; ?></li>
                    <li>Nerijus  <?php print $nerijus; ?></li>
                    <li>Marius <?php print $marius; ?></li>
                </ul>
            </div>

        </main>
    </body>
</html>
