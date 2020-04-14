<header>
    <nav>
        <ul>
            <?php foreach ($nav as $links): ?>
                <li>
                    <?php include 'nav_a_link.php';?>
                    <?php if (isset($links['drop_down'])): ?>
                        <div class="dropdown">
                            <ul>
                                <?php foreach ($links['drop_down'] ?: [] as $links): ?>
                                    <li><a href="<?php print $links['link'];?>"><?php print $links['name'];?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>