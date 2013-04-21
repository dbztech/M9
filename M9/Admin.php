<!doctype html>
<!-- This file contains the admin panel -->
<!-- It will be included by index.php -->
<html>
    <head>
        <link rel="stylesheet" href="styles.css" />
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body onload="Core.load();">
        <h1>M9 Admin Panel</h1>
        <?php
            cards::adminPanel();
        ?>
        <hr />
        <input type="button" value="Logout" onclick="window.location = '/M9/Logout.php'" />
    </body>
</html>