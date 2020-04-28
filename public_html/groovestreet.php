<?php
$job_seekers = [];

function person($name, $profession, $age)
{
    return $person = [
        'name' => $name,
        'profession' => $profession,
        'age' => $age,
        'from' => date('Y.m.d'),
        'till' => date('Y.m.d', strtotime('+ 2 years'))
    ];
}
$job_seekers[] = person("Antanas", 'Stalius', 60);
$job_seekers[] = person("Olga", 'Proste', 38);

foreach ($job_seekers as $array_name_key) {
    if ($array_name_key['age'] > 50) {
        $job_seekers[]= ['Over_50' => $array_name_key];
    } else {
        $job_seekers[]= ['under_50' => $array_name_key];
    }
}
var_dump($job_seekers);
?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>includes</title>
    <style>

    </style>
</head>
<body>

<main>
    <ul>

    </ul>
</main>

</body>