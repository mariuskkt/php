<html lang="en" dir="ltr">
<head>
    <title> <?php print $data['head']['title']; ?> </title>
    <?php foreach ($data['head']['css'] ?? [] as $css): ?>
        <link rel="stylesheet" href="<?php print $css; ?>">
    <?php endforeach; ?>
    <?php foreach ($data['head']['js'] ?? [] as $js): ?>
        <script src="<?php print $js ?>"></script>
    <?php endforeach; ?>
</head>
<body>
<?php print $data['header']; ?>
<?php print $data['content']; ?>
<?php print $data['footer']; ?>
</body>
</html>