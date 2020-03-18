<?php
$car_market = [];

/**
 * function makes an array which can be be added in to job_seekers array
 * @param $name string for name
 * @param $profession string for profession
 * @param $age int for age
 * @param $sex string for sex
 * @return array
 */
function car($name, $model, $year_made, $type, $price):array
{
    return [
        'name' => $name,
        'model' => $model,
        'year_made' => $year_made,
        'type' => $type,
        'price' => $price,
    ];
}


function price_selection($cars,$min,$max)
{
    $results = [];
    foreach ($cars as $car) {
        if ($car['price'] > $min && $car['price'] < $max) {
            $results['over_' . $min . '_' . 'under_' . $max][] = $car;
        }
    }
    return $results;

}

$car_market[] = car('ford', 'Focus',1999,'Caravan','2000');
$car_market[] = car('Opel', 'Astra',2009,'Sedan','5010');

var_dump($car_market);
var_dump(price_selection($car_market,1000,3000));

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
<!--    --><?php //foreach ($job_seekers as $person): ?>
<!--        <p>--><?php //print person_to_string($person) ?><!--</p>-->
<!--    --><?php //endforeach;?>
</main>
</body>