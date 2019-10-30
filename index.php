

<html>
    <head>
        <title>Bomba</title>
        <style>
            img{
                height:<?php print 100 + date('s')?>px;
                width: <?php print 100 + date('s')?>px; 
            }
        </style>
    </head>
    <body>
        <main>
            <div> <img src="/img/bomb.jpg"></div>
            <?php print date('s'); ?> 
        </main>
    </body>
</head>
</html>