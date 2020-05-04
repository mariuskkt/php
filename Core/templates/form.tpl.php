<form
    <?php print html_attr(($data['attr'] ?? []) + ['method' => 'POST']); ?>>

    <?php foreach ($data['fields'] ?? [] as $field_id => $field): ?>

        <label>
            <span><?php print $field['label'] ?: [] ?></span>
            <?php if (in_array($field['type'], ['text', 'password', 'number', 'email', 'color'])): ?>
                <input <?php print html_attr(($data['fields'][$field_id]['extra']['attr'] ?? []) + [
                        'name' => $field_id,
                        'type' => $field['type'],
                        'value' => $field['value'] ?? '',
//                        'placeholder' => $field['label'] ?? ''
                    ]);
                ?>
            <?php elseif (in_array($field['type'], ['select'])): ?>
                <select <?php print html_attr(($data['fields'][$field_id]['extra']['attr'] ?? []) + [
                        'name' => $field_id,
                        'type' => $field['type'],
                        'value' => $field['value'] ?? ''
                    ]);
                ?>>
                    <?php foreach ($field['option'] as $option_id => $option_title): ?>
                        <option value="<?php print $option_id; ?>"
                            <?php print ($field['value'] == $option_id) ? 'selected' : ''; ?>>
                            <?php print $option_title; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php elseif (in_array($field['type'], ['textarea'])) : ?>
                <textarea <?php print html_attr(($data['fields'][$field_id]['extra']['attr'] ?? []) + [
                        'name' => $field_id,
                        'type' => $field['type'],
                    ]) ?>>
                    <?php print $field['value'] ?? '' ?>
                </textarea>
            <?php elseif (in_array($field['type'], ['radio'])) : ?>
                <?php foreach ($field['options'] as $option_id => $radio_value): ?>
                    <label>
                        <div class="radio">
                            <span><?php print $option_id; ?></span>
                            <input <?php print radio_attr($field, $field_id, $option_id ) ?>>
                        </div>
                    </label>
                <?php endforeach; ?>
            <?php endif; ?>
        </label>
        <?php if (isset($field['error'])): ?>
            <span class="error"><?php print $field['error']; ?></span>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php foreach ($data['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php print html_attr(($button['extra']['attr'] ?? []) +
            [
                'name' => 'action',
                'value' => $button_id
            ]) ?>>
            <?php print $button['title'] ?>
        </button>
    <?php endforeach; ?>
    <?php if (isset($data['error'])): ?>
        <span class="error"><?php print $data['error']; ?></span>
    <?php endif; ?>
</form>