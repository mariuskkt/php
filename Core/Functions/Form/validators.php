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
