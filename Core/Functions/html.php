<?php


/**
 * converts $array['attr'] to string
 * @param array $array
 * @return string
 */
function html_attr(array $array): string
{
    $text = '';
    foreach ($array as $index => $value) {
        $text .= $index . '=' . '"' . $value . '"' . ' ';

    }
    return $text;
}

/**
 * creates input attribute in form tpl
 * @param $field_id
 * @param $field
 * @return string
 */
function input_attr(array $field, string $field_id): string
{
    $attr = [
        'name' => $field_id,
        'value' => $field['value'] ?? '',
        'type' => $field['type']
    ];

    return html_attr(($field['extra']['attr'] ?? []) + $attr);
}

/**
 * creates select attributes in form tpl
 * @param $field_id
 * @param $field
 * @return string
 */
function select_attr(array $field, string $field_id): string
{
    $attr = [
        'name' => $field_id,
        'value' => $field['value'] ?? '',
        'type' => $field['type']
    ];

    return html_attr(($field['extra']['attr'] ?? []) + $attr);
}

/**
 * creates option attributes in form tpl
 * @param $field
 * @param $option_id
 * @return string
 */
function option_attr(array $field, string $option_id): string
{
    $attr = [
        'value' => $option_id,
    ];

    if ($field['value'] == $option_id) {
        $attr['selected'] = true;
    }

    return html_attr($attr);
}


/**
 * creates textarea attributes in form tpl
 * @param $field
 * @param $field_id
 * @return string
 */
function textarea_attr(array $field, string $field_id): string
{
    $attr = [
        'name' => $field_id,
        'type' => $field['type']
    ];

    return html_attr(($field['extra']['attr'] ?? []) + $attr);
}

/**
 * creates radio buttons attributes in form tpl
 * @param $field
 * @param $field_id
 * @param $option_id
 * @return string
 */
function radio_attr($field, $field_id, $option_id): string
{
    $attr = [
        'name' => $field_id,
        'value' => $option_id,
        'type' => 'radio'
    ];
    if ($option_id == ($field['value']) ?? null) {
        $attr['checked'] = true;
    }
    return html_attr(($field['extra']['attr'] ?? []) + $attr);
}
