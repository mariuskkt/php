<footer>
    <ul class="footer-ul">
        <?php foreach ($data['links'] as $link_value): ?>
            <li class="footer-li">
                <a class="footer-li-a" href="<?php print $link_value['link'] ?>">
                    <?php print $link_value['name'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
    <p><?php print $data['copyright']; ?></p>
</footer>