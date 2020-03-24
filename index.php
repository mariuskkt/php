<?php

if (isset($_POST['name']) && $_POST['name'] != '') {
    $name = $_POST['name'];
} else {
    $name = '';
}
if (isset($_POST['surname']) && $_POST['surname'] != '') {
    $surname = $_POST['surname'];
} else {
    $surname = '';
}


if (isset($_POST['age']) && $_POST['age'] != '') {
    $age = $_POST['age'] . ' years old';

} else {
    $age = ' age not given';
}

if (isset($_POST['sex']) && $_POST['sex'] != '') {
    $sex = $_POST['sex'];

} else {
    $sex = 'sex not selected';
}
if (isset($_POST['level']) && $_POST['level'] != '') {
    $level = $_POST['level'];

}
if (isset($_POST['textarea']) && $_POST['textarea'] != '') {
    $text_area = $_POST['textarea'];

} else {
    $text_area = 'Nothing to show';
}

$h1 = $name . ' ' . $surname;


if (!empty($_POST)) {
    $p = strtr('is a @age @sex is the @level level developer and is looking for: ', [
        '@sex' => $sex,
        '@age' => $age,
        '@level' => $_POST['level'],
    ]);
    $style = 'box-shadow: 0 0 10px darkgreen';
    $text = $text_area;

    if ($sex == 'male') {
        $src = '<img src="https://1qxhwojc9e83sxfid3a7dbw1-wpengine.netdna-ssl.com/wp-content/uploads/Developer.png">';
    } elseif ($sex == 'female') {
        $src = '<img src="https://static.thenounproject.com/png/94093-200.png">';
    } else {
        $src = '';
    }
} else {
    $p = '';
    $src = '';
    $text = '';
    $style = '';
}

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "assets/css/style.css" />
    <title></title>
    <style>
    </style>
</head>
<body>
<main>
    <form method="post">
        <label>
            <span>Name:</span>
            <input name="name" type="text" required>
        </label>
        <label>
            <span>Surname:</span>
            <input name="surname" type="text" required>
        </label>
        <label>
            <span>Age:</span>
            <input name="age" type="number" min="18" max="120">
        </label>
        <section class="radio">
            <label>
                <span>Male:</span>
                <input class="radio-button" placeholder="male" name="sex" type="radio" value="male">
            </label>
            <label>
                <span>Female:</span>
                <input class="radio-button" name="sex" type="radio" value="female">
            </label>
        </section>
        <label>
            <span>Level:</span>
            <select name="level">
                <option value="">--Please choose an option--</option>
                <option value="beginner">Beginner</option>
                <option value="advanced">Advanced</option>
                <option value="expert">Expert</option>
            </select>

        </label>
        <label>
            <textarea name="textarea" placeholder="Is looking for:"></textarea>
        </label>
        <button type="submit" value="print">Print</button>
    </form>

    <div class="form_visual" style="<?php print $style ?>">
        <h1><?php print $h1 ;?></h1>
        <p><?php print $p ;?></p>
        <p><?php print $text ;?></p>
        <?php print $src ;?>
    </div>
</main>
</body>
</html>

