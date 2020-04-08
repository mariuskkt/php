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

function radio_attr($field, $field_id, $option_id): string
{
    $attr = [
        'name' => $field_id,
        'value' => $option_id,
        'type' => 'radio'
    ];
    if ($option_id == ($field['value']) ?? null ){
        $attr['checked'] = true;
    }
    return html_attr($attr);
}
