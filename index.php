<?php
$months = 12;
$wallet = 1000;
$month_income = 700;

for ($x = 1; $x <= $months; $x++) {
    $month_expenses = rand(300, 699);
    $wallet += $month_income - $month_expenses;
}

$h1 = 'Wallet forecast';
$h2 = "Po $months m., prognozuojamas likutis: $wallet";
?>
<html>
    <head>
        <title>Wallet</title>
    </head>
    <body>
        <h1><?php print $h1; ?></h1>
        <h2><?php print $h2; ?></h2>
    </body>
</html>
