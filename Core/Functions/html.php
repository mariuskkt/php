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

