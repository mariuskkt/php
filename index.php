
<html>
    <head>
        <title>Bomba</title>
        <style>
            .bomb{
                background-size:<?php print date('s'); ?>%;
                background-repeat:no-repeat;
                height:500px;
                width:500px; 
                background-image: url("/img/bomb.jpg");
            }
            .bomb00{
                background-size: cover;
                background-image:url("/img/bomb1.jpg");
            }
        </style>
    </head>
    <body>
        <main>
            <div class="bomb bomb<?php print date('s'); ?>">
                <?php print date('s'); ?>
            </div>  
        </main>
    </body>
</head>
</html>





