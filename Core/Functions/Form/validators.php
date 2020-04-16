<?php

/**
 * checks if input value is integer
 * @param int $field_input
 * @param array $field
 * @return bool
 */
function validate_is_number($field_input, array &$field): bool
{
    if (!is_numeric($field_input)) {
        $field['error'] = 'Type in integer';
        return false;
    }
    return true;
}

/**
 * checks if input value is positive int
 * @param int $field_input
 * @param array $field
 * @return bool
 */
function validate_is_positive($field_input, array &$field): bool
{
    if ($field_input < 0) {
        $field['error'] = 'Number is negative';
        return false;
    }
    return true;
}


/**
 * checks if input field is empty and if it is empty returns stirng in error array and boolean
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_not_empty($field_input, &$field)
{
    if (strlen($field_input) == 0) {
        $field['error'] = 'field is empty';
        return false;
    }
    return true;
}

/**
 * checks if there is a space in a string
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_space($field_input, &$field)
{
    if (!strpos($field_input, ' ')) {
        $field['error'] = 'Name must contain Name and Surname';
        return false;
    }
    return true;
}


/**
 *  F-cija, patikrinanti ar fieldai sutampa
 * @param array $filtered_input isfiltruotas _POST masyvas
 * @param array $form
 * @param array $params sutampanciu fieldu indeksu masyvas
 * @return bool
 */
function validate_fields_match(array $filtered_input, array &$form, array $params): bool
{
    $comparison_field_id = $params[0];
    $comparison = $filtered_input[$comparison_field_id];

    foreach ($params as $field_id) {
        if ($comparison != $filtered_input[$field_id]) {
            $form['error'] = 'Fields do not match';
            $form['fields'][$field_id]['error'] = strtr('This field must match "@field" ', [
                '@field' => $form['fields'][$comparison_field_id]['label']
            ]);
            return false;
        }
    }
    return true;
}


/**
 * checks if field input is not too long or not short
 * @param $field_input
 * @param $field
 * @param $params
 * @return bool
 */
function validate_text_length($field_input, array &$field, array $params): bool
{
    $length = strlen($field_input);
    if ($length > $params['max']) {
        $field['error'] = 'Word is too long';

        return false;

    } elseif ($length < $params['min']) {
        $field['error'] = 'Word is too short';

        return false;
    }

    return true;
}


/**
 * checks number if it matches default type
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_phone($field_input, array &$field): bool
{
    $default = "/\+3706(\d{7})$/";

    if (!empty($field_input)) {
        if (!preg_match_all($default, $field_input)) {
            $field['error'] = 'Number must be like +3706XXXXXXX';
        }
    }

    return true;

}

/**
 * validates if email is unique
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_email_unique($field_input, array &$field): bool
{
    $data = file_to_array('app/data/users.json') ?: [];
    $found = false;

    foreach ($data as $user_id) {
        if ($user_id['email'] == $field_input) {
            $found = true;
            break;
        }
    }
    if ($found) {
        $field['error'] = 'Such email already exists';

        return false;
    }

    return true;
}


/**
 * validates if login matches db
 * @param array $safe_input
 * @param array $field
 * @return bool
 */
function validate_login(array $safe_input, array &$field): bool
{
    $data = file_to_array('app/data/users.json') ?: [];

    $found = false;

    if (isset($safe_input['email'])) {
        foreach ($data as $user_id) {
            if ($user_id['email'] == $safe_input['email'] && $user_id['password'] == $safe_input['password']) {
                $found = true;
                break;
            }
        }
    }
    if (!$found) {
        $field['error'] = 'Wrong login credentials';

        return false;
    }

    return true;
}

/**
 * validates if email field input is email
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_email($field_input, array &$field): bool
{
    $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';
    if (!preg_match_all($pattern, $field_input)) {
        $field['error'] = 'Such email address is not valid';
        return false;
    }
    return true;
}
