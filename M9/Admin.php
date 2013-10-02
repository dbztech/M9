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
            <input type="button" value="Logout" class="btn" onclick="window.location = '/M9/Logout.php'" />
        </div>
        <div id="content">
            <h1>M9 Admin Panel</h1>
            <hr />
            <?php
                cards::adminPanel();
            ?>
        </div>
    </body>
</html>