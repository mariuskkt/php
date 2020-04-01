<?php


function get_filtered_input(array $form): ?array
{
    $filter_params = [];
    foreach ($form['fields'] as $field_index => $field_value) {
        if (isset($field_value['filter'])) {
            $filter_params[$field_index] = $field_value['filter'];
        } else {
            $filter_params[$field_index] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    };
    return filter_input_array(INPUT_POST, $filter_params);
}

/**
 * function which validates fields
 * @param array $form
 * @param array $safe_input
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;

    foreach ($safe_input as $input_id => $value) {

        $field = &$form['fields'][$input_id];
        if ($safe_input[$input_id] != '') {
            $field['value'] = $value;
        }
        if (isset($field['validate'])) {
            foreach ($field['validate'] as $function_key => $function) {
                if (is_array($function)) {
                    $valid = $function_key($value, $field, $function);
                } else {
                    $valid = $function($value, $field);
                }
                if (!$valid) {
                    $success = false;
                    break;
                }
            }
        }
    }
    if ($success) {
        foreach ($form['validators'] ?? [] as $function_key => $function) {
            if (is_array($function)) {
                $valid = $function_key($safe_input, $form, $function);
            } else {
                $valid = $function($safe_input, $form);
            }
            if (!$valid) {
                $success = false;
                break;
            }
        }
    }

    if (isset($form['callbacks']['success']) && $success) {
        $form['callbacks']['success']($form, $safe_input);
    } elseif (isset($form['callbacks']['failed']) && !$success) {
        $form['callbacks']['failed']($form, $safe_input);
    }


    return $success;
}


