<?php

/**
 * checks if session password is the same as db password
 * @return bool|void
 */
function is_logged_in()
{
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

        if (App\App::$db->getRowsWhere('users', ['email' => $_SESSION['email'], 'password' => $_SESSION['password']])) {
            return true;
        } else {

            logout(false);
        }
    }

    return false;
}

/**
 * Checks if the user is logged in with or without a changed password
 * @return mixed
 */
function current_user()
{
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

        $conditions = [
            'email' => $_SESSION['email'],
            'password' => $_SESSION['password']
        ];
        if ($users = App\App::$db->getRowsWhere('users', $conditions)) {
            return reset($users);
        }
    }
    return false;
}


/**
 * resets cookies and redirects to login page
 * @param bool $redirect
 */
function logout($redirect = false)
{
    $_SESSION = [];
    setcookie('PHPSESSID', null, -1);
    header("Location: /login.php");
}