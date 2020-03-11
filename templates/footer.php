<footer>
    <ul class="footer-ul">
        <?php foreach ($footer['links'] as $links_key => $link_value): ?>
            <li class="footer-li">
                <a class="footer-li-a" href="<?php print $link_value['link'] ?>">
                    <?php print $link_value['name'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
    <?php foreach ($footer['copyright'] as $key => $value) :?>
        <p><?php print $value ;?></p>
    <?php endforeach ;?>
</footer>