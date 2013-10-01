<!doctype html>
<!-- This file contains the admin panel -->
<!-- It will be included by index.php -->
<html>
    <head>
        <?php m9::addframework('Bootstrap'); ?>
        <link rel="stylesheet" href="styles.css" />
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body onload="Core.load();">
        <div id="nav">
            <img alt="Profile Pic" src="http://www.gravatar.com/avatar/<?php echo user::getGravatar(); ?>?s=400" id="profilepic" />
        </div>
        <div id="content">
            <h1>M9 Admin Panel</h1>
            <?php
                cards::adminPanel();
            ?>
            <hr />
            <input type="button" value="Logout" onclick="window.location = '/M9/Logout.php'" />
        </div>
    </body>
</html>