<?php
$job_seekers = [];

/**
 * function makes an array which can be be added in to job_seekers array
 * @param $name string for name
 * @param $profession string for profession
 * @param $age int for age
 * @param $sex string for sex
 * @return array
 */
function person($name, $profession, $age, $sex):array
{
    return [
        'name' => $name,
        'profession' => $profession,
        'age' => $age,
        'sex' => $sex,
        'from' => date('Y.m.d'),
        'till' => date('Y.m.d', strtotime('+ 2 years'))
    ];
}


function age_selection($people)
{
    $sorted = [];
    foreach ($people as $person) {
        if ($person['age'] > 50) {
            $sorted['over_50'][] = $person;
        } else {
            $sorted['under_50'][] = $person;
        }
    }
    return $sorted;

}

$job_seekers[] = person("Antanas", 'Stalius', 60, 'male');
$job_seekers[] = person("Olga", 'Striptiziorka', 38, 'female');

var_dump($job_seekers);
var_dump(age_selection($job_seekers));

function person_to_string($person)
{
    return strtr('@name @age @sex an ex @profession is looking for a new job ', [

        '@name' => $person['name'],
        '@age' => $person['age'] . 'year old',
        '@sex' => $person['sex'],
        '@profession' => $person['profession']
    ]);

}


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
    <?php foreach ($job_seekers as $person): ?>
        <p><?php print person_to_string($person) ?></p>
    <?php endforeach;?>
</main>
</body>