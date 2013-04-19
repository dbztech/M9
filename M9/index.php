<?php
include('M9.php');

$login = false;

if (count($_POST) > 0) {
    #If login data is recieved
    if (filter::username($_POST['username']) == $tempusername && hash('sha256', filter::password($_POST['password'])) == $temppassword) {
        setcookie("username", $_POST['username']);
        #Replace with randhash
        setcookie("password", hash('sha256', $_POST['password']));
        $login = true;
    } else {
        echo "Password invalid";
        $login = false;
    }
}

if (count($_COOKIE) > 0) {
    #If the user has cookies, this is very likely
    #Replace with randhash
    if (filter::username($_COOKIE['username']) == $tempusername && filter::password($_COOKIE['password']) == $temppassword) {
        $login = true;
    } else {
        $login = false;
    }
}

if ($login) {
    include('Admin.php');
} else {
    include('Login.php');
}

?>