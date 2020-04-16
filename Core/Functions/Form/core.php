<?php


function get_filtered_input(array $form): ?array
{
    $filter_params = [];
    foreach ($form['fields'] ?? [] as $field_index => $field_value) {
        if (isset($field_value['filter'])) {
            $filter_params[$field_index] = $field_value['filter'];
        } else {
            $filter_params[$field_index] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    };
    return filter_input_array(INPUT_POST, $filter_params);
}

/**
 * funkcija kuri tikrina pacia forma ir sukuria fieldams errorus
 * @param array $form siunciame forma kuria naudosime
 * @param array $safe_input isfiltruotas POST masyvas
 * @return bool
 */
function validate_form(array &$form, array $safe_input): bool
{
    $success = true;

    foreach ($form['fields'] as $field_index => &$field) {
        $field['value'] = $safe_input[$field_index];

        if (isset($field['validate'])) {
            foreach ($field['validate'] as $validator_index => $field_validator) {
                if (is_array($field_validator)) {
                    $validator_function = $validator_index;
                    $validator_params = $field_validator;

                    $valid = $validator_function($field['value'], $field, $validator_params);
                } else {
                    $validator_function = $field_validator;

                    $valid = $validator_function($field['value'], $field);
                }
                if (!$valid) {
                    $success = false;
                    break;
                }
            }
        }
    }

    //tikrinsim formos lygio validatorius
    if ($success) {
        foreach ($form['validators'] ?? [] as $validator_index => $form_validator) {
            if (is_array($form_validator)) {
                $validator_function = $validator_index;
                $validator_params = $form_validator;

                $valid = $validator_function($safe_input, $form, $validator_params);
            } else {
                $validator_function = $form_validator;

                $valid = $validator_function($safe_input, $form);
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

/**
 * takes data values and fills it in to the form values
 * @param array $form
 * @param array $data
 */
function fill_form(array &$form, array $data): void
{
    foreach ($form['fields'] as $field_index => &$field) {
        if (isset($data[$field_index])) {
            $field['value'] = $data[$field_index];
        }
    }
}
