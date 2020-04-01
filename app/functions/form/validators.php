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
 * @param $params
 * @return bool
 */
//function validate_18_to_100($field_input, array &$field)
//{
//    if ($field_input > 100) {
//        $field['error'] = 'Too old';
//        return false;
//    } elseif ($field_input < 18) {
//        $field['error'] = 'Too young';
//        return false;
//    }
//
//    return true;
//}

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
        $field['error'] = 'Too old';
        return false;
    } elseif ($field_input < $params['min']) {
        $field['error'] = 'Too young';
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

        return false;
    }

    return true;
}
