<?php
$input = ["U Suck lol", "Gaaaaay", "You will find your love. P.S Joke", "Yo mama suck", "Unfortunately but I fucked your mom"];
?>
<html lang="en" dir="ltr">
   <head>
       <title>Kiausrakulas</title>
       <link href="https://fonts.googleapis.com/css?family=Yeon+Sung&display=swap" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="kiausrakulas_style.css">
   </head>
   <body class="center bg-wall">
       <header>
           <nav class="menu">
               <a href="index.php">INDEX</a>
               <a class ="current" href="kiausrakulas.php">KIAUSRAKULAS</a>
               <a href="about.php">ABOUT</a>
               <a href="contacts.php">CONTACT</a>
           </nav>
       </header>
       <h1 class="h1-text">Kiausrakulas epta</h1>
       <div class="box center">
           <div class="inside-text">
               <span><?php print $input[array_rand($input)]; ?></span>
           </div>
       </div>
   </body>
</html>
