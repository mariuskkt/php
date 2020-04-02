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
    if (empty($field_input)) {
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
 * @param $safe_input isfiltruotas post masyvas
 * @param $form
 * @param $params sutampanciu fieldu indeksu masyvas
 * @return bool
 */
function validate_fields_match($safe_input, &$form, $params)
{
    $comparison_field_id = $params[0];
    $comparison = $safe_input[$comparison_field_id];

    foreach ($params as $field_id) {
        if ($comparison != $safe_input[$field_id]) {
            $form['error'] = 'Fields do not match';
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
