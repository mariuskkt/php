<?php

/**
 * checks if input value is not more than 100
 * @param int $field_input
 * @param array $field
 * @return bool
 */
function validate_max_100($field_input, array &$field): bool
{
    if ($field_input > 100) {
        $field['error'] = 'Number is too big';
        return false;
    }
    return true;
}
