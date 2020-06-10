<table>
    <thead>
    <?php foreach ($data['thead'] ?? [] as $thead => $thead_value) : ?>
        <th><?php print $thead_value; ?></th>
    <?php endforeach; ?>
    </thead>
    <tbody>
    <?php foreach ($data['tbody'] ?? [] as $trow): ?>
        <tr>
            <?php foreach ($trow ?? [] as $tcol_value): ?>
                <td> <?php print  $tcol_value; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


