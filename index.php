<?php
    $soup_ml = rand(400, 700);
    $soup_temp = rand(15, 40);
    $piss_ml = rand(100, 350);
    $piss_temp = 36.4;

    $piss_soup_temp = ($soup_ml * $soup_temp + $piss_ml * $piss_temp)/ ($soup_ml + $piss_ml);
?>

<html>
<head>
    <title>Sysaline</title>
</head>
<body>
    <h1>Sriubos prognozė</h1>
    <p>Pradžioje puode buvo <?php print $soup_ml?> ml. <?php print $soup_temp ?> C sriubos. </p>
    <p>Į puodą primyžus <?php print $piss_ml ?> ml., sriubos temperatūra patapo <?php print $piss_soup_temp ?> C. </p>
</body>
</html>
