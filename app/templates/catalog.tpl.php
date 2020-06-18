<div class="container">
    <?php foreach ($data ?? [] as $drink): ?>
        <div class="drink_container">
            <h3><?php print $drink['data']->price ?> €</h3>
            <div>
                <img class="drink_photo" src="<?php print $drink['data']->photo ?>">
            </div>
            <h2><?php print $drink['data']->name ?></h2>
            <p><?php print $drink['data']->percentage ?> %</p>
            <p><?php print $drink['data']->volume ?> ml</p>
            <p>Quantity in warehouse: <?php print $drink['data']->amount ?></p>
            <?php if ($drink['form'] ?? null) : ?>
                <?php print $drink['form']; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
