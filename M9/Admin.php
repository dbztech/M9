<!doctype html>
<!-- This file contains the admin panel -->
<!-- It will be included by index.php -->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php m9::addframework('jQuery'); ?>
        <?php m9::addframework('Bootstrap'); ?>
        <?php m9::addframework('TinyMCE'); ?>
        <link rel="stylesheet" href="styles.css" />
        <script type="text/javascript" src="scripts.js"></script>
        <link rel="shortcut icon" href="/M9/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/M9/favicon.ico" type="image/x-icon">
        <title>M9 Admin Panel</title>
    </head>
    <body onload="Core.load();">
        <!--
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
        -->
        <div class="view" id="intro">
            <img src="Resources/Images/M9v2.svg" alt="M9" class="logo" />
        </div>
        <div id="content">
            <!--<img src="/M9/Resources/Images/dbzbadge.svg" alt="Designed by DBZ Technology" class="dbzbadge" />-->
            <a class="btn btn-info back" id="Back" onclick="Interface.popPanel();"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
            <h1 class="lead">Welcome to the M9 content managment system by <a href="http://dbztech.com" style="color: rgb(40, 182, 44);" target="_blank">DBZ Technology</a></h1>
            <?php
                cards::adminPanel();
            ?>
            <script>
              jQuery(".filltext").fitText();
            </script>
        </div>
    </body>
</html>