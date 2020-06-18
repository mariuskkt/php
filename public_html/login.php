<?php

require '../bootloader.php';

//use App\App;
//use Views\Nav;
//use Core\Views\Form;

$nav = new App\Views\Nav();
$form = new \App\Views\Forms\Auth\LoginForm();

/**
 * if fields are filled in correctly
 * @param $data
 * @param $safe_input
 * @throws Exception
 */
if ($form->isSubmitted()) {
    if ($form->validate()) {

        $safe_input = $form->getSubmitData();
        \App\App::$session->login($safe_input['email'], $safe_input['password']);
        header("Location: /index.php");
    }
}


?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<?php print $nav->render() ?>
<main>
    <h1>Login</h1>
    <form method="post">
        <?php print $form->render() ?>
    </form>
</main>
</body>
</html>