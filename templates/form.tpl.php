<form
    <?php print form_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>

    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

        <label>
            <span><?php print $field['label'] ?></span>
            <?php if (in_array($field['type'], ['text', 'password', 'number'])): ?>
                <input <?php print form_attr(($form['fields'][$field_id]['extra']['attr'] ?? []) + [
                        'name' => $field_id,
                        'type' => $field['type'],
                        'value' => $field['value'] ?? ''
                    ]);
                ?>>
            <?php elseif (in_array($field['type'], ['select'])): ?>
                <select <?php print form_attr(($form['fields'][$field_id]['extra']['attr'] ?? []) + [
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
                <textarea <?php print form_attr(($form['fields'][$field_id]['extra']['attr'] ?? []) + [
                        'name' => $field_id,
                        'type' => $field['type'],
                    ]) ?>>
                    <?php print $field['value'] ?? '' ?>
                </textarea>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>
    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
        <button <?php print form_attr(($button['extra']['attr']) ?? [] +
            [
                'name' => 'action',
                'value' => $button_id
            ]) ?>>
            <?php print $button['title'] ?>
        </button>
    <?php endforeach; ?>
</form>