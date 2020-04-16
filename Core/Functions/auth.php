<?php

/**
 * checks if session password is the same as db password
 * @return bool|void
 */
function is_logged_in()
{
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

        $file_name = 'app/data/users.json';
        $data = file_to_array($file_name) ?: [];

        foreach ($data as $user_id) {
            if ($user_id['email'] == $_SESSION['email']) {
                if ($_SESSION['password'] == $user_id['password']) {
                    return true;
                } else {
                    logout(false);
                }
            }
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