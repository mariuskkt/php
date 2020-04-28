<?php

///**
// * checks if input value is not more than 100
// * @param int $field_input
// * @param array $field
// * @return bool
// */
//function validate_max_100($field_input, array &$field): bool
//{
//    if ($field_input > 100) {
//        $field['error'] = 'Number is too big';
//        return false;
//    }
//
//    return true;
//}


/**
 * validates if input age is between 18 and 100
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_18_to_100($field_input, array &$field)
{
    if ($field_input > 100) {
        $field['error'] = 'Too old';
        return false;
    } elseif ($field_input < 18) {
        $field['error'] = 'Too young';
        return false;
    }

    return true;
}

/**
 *
 * @param $field_input
 * @param array $field
 * @param $params
 * @return bool
 */
function validate_field_range($field_input, array &$field, $params)
{
    if ($field_input > $params['max']) {
        $field['error'] = 'Number is too high';
        return false;
    } elseif ($field_input < $params['min']) {
        $field['error'] = 'Number is too low';
        return false;
    }

    return true;
}

/**
 * checks if selector selected
 * @param $field_input
 * @param array $field
 * @return bool
 */
function choose_action($field_input, array &$field)
{
    if (empty($field_input)) {
        $field['error'] = 'Choose one selection';
        return false;
    }
    return true;
}

/**
 * checks if option from select is valid
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_select($field_input, array &$field)
{
    if (!isset($field['option'][$field_input])) {
        $field['error'] = 'Neapipisi, lopas';
//        var_dump($field['option'][$field_input]);

        return false;
    }

    return true;
}

/**
 * checks if team member with such a name already exists
 * @param $safe_input
 * @param $form
 * @return bool
 */
function validate_player($safe_input, &$form)
{
    $teams = file_to_array(TEAMS_DB);
    $team_id = $safe_input['team'];
    $players = $teams[$team_id]['players'];

    foreach ($players as $player_id => $player_attr) {
        if ($player_attr['nickname'] == $safe_input['nickname']) {
            $form['error'] = 'Tokia darzove komandoj jau yra';
            return false;
        }
    }
    return true;
}

/**
 * checks if a team name from input doesn't exist in db
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_team($field_input, array &$field): bool
{
    $data = file_to_array(TEAMS_DB);

    foreach ($data ?: [] as $data_index => $data_value) {
        if ($field_input == $data_value['team_name']) {
            $field['error'] = 'Team with such name already exist';

            return false;
        }
    }

    return true;
}

/**
 * funkcija validuoja ar toks zaidejas egzistuoja datoj
 * @param $safe_input
 * @param $form
 * @return bool
 */
function validate_kick(array $safe_input, array &$form): bool
{
    $data = file_to_array(TEAMS_DB) ?: [];
    $found = false;

    if (isset($_SESSION['team_id'])) {
        $team = $data[$_SESSION['team_id']];

        foreach ($team['players'] as $player_id) {
            if ($player_id['nickname'] == $_SESSION['nick_name']) {
                $found = true;
                break;
            }
        }
    }
    if (!$found) {
        $form['error'] = 'Such player doen\'t exist';

        return false;
    }

    return true;
}

/**
 * validates if pixels are owned by another user
 * @param $filtered_input
 * @param array $form
 * @param $params
 * @return bool
 */
function validate_pixels($filtered_input, array &$form, $params)
{

    $x = $filtered_input[$params[0]];
    $y = $filtered_input[$params[1]];

    $pixels_array = App\App::$db->getRowsWhere('pixels', []);

    foreach ($pixels_array as $pixel_id) {
        if ($pixel_id['email'] != $_SESSION['email']) {
            if ($pixel_id['x'] == $x && $pixel_id['y'] == $y) {
                $form['fields']['x']['error'] = 'This pixel is owned by another user';
                $form['fields']['y']['error'] = 'This pixel is owned by another user';

                return false;
            }
        }
    }

    return true;
}