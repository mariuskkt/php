<?php
    $soup_ml = rand(400, 700);
    $soup_temp = rand(15, 40);
    $piss_ml = rand(100, 350);
    $piss_temp = 36.4;

    $piss_soup_temp = ($soup_ml * $soup_temp + $piss_ml * $piss_temp)/ ($soup_ml + $piss_ml);
    $h1 = "Sriubos prognozė";
    $p1 = "Pradžioje puode buvo" .  <?php print $soup_ml?> . "ml." . <?php print $soup_temp ?> . "C sriubos.";
    $p2 = "Į puodą primyžus" . <?php print $piss_ml ?> . "ml.," . "sriubos temperatūra patapo" . <?php print $piss_soup_temp ?> . "C."; 
?>

<html>
<head>
    <title>Sysaline</title>
</head>
<body>
    <h1><?php print $h1; ?></h1>
    <p> <?php print $p1; ?></p>
    <p><?php print $p2; ?></p>
</body>
</html>
