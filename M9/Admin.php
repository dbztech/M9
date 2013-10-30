<!doctype html>
<!-- This file contains the admin panel -->
<!-- It will be included by index.php -->
<html>
    <head>
        <meta name="viewport" content="initial-scale=1">
        <?php m9::addframework('jQuery'); ?>
        <?php m9::addframework('Bootstrap'); ?>
        <?php m9::addframework('TinyMCE'); ?>
        <link rel="stylesheet" href="styles.css" />
        <script type="text/javascript" src="scripts.js"></script>
        <title>M9 Admin Panel</title>
    </head>
    <body onload="Core.load();">
        <div id="nav">
            <img alt="Profile Pic" src="http://www.gravatar.com/avatar/<?php echo user::getGravatar(); ?>?s=400" class="profilepic img-circle" />
            <input type="button" value="Logout" class="btn btn-default" onclick="window.location = '/M9/Logout.php'" />
        </div>
        <div id="subnavcontainer">
            <div class="subnav" id="ChangeDataNav">
                <p>Change Content</p>
            </div>
            <div class="subnav" id="CreateDataNav">
                <p>Create Content</p>
            </div>
            <div class="subnav" id="ChangeUsersNav">
                <p>Change Users</p>
            </div>
            <div class="subnav" id="CreateUsersNav">
                <p>Create Users</p>
            </div>
            <div class="subnav navtwo" id="ChangeDataContentNav">
                <p>Change Data</p>
            </div>
            <div class="subnav navtwo" id="ChangeDataTagNav">
                <p>Change Tag</p>
            </div>
            <div class="subnav navtwo" id="ChangeUsernameNav">
                <p>Change Username</p>
            </div>
            <div class="subnav navtwo" id="ChangeUserPasswordNav">
                <p>Change Password</p>
            </div>
            <div class="subnav navtwo" id="ChangeUserTypeNav">
                <p>Change User Type</p>
            </div>
            <div class="subnav navtwo" id="AddGroupNav">
                <p>Add Group</p>
            </div>
        </div>
        <div id="content">
            <a class="btn btn-info back" id="Back" onclick="Interface.popPanel();"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
            <h1>M9 Admin Panel</h1>
            <hr />
            <?php
                cards::adminPanel();
            ?>
        </div>
    </body>
</html>