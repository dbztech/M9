<?php
#This file handled login information and load admin panel
include('M9.php');

if ($recaptchaenabled) {
    // The response from reCAPTCHA
    $resp = null;
    // The error code from reCAPTCHA, if any
    $error = null;

    $reCaptcha = new ReCaptcha($secret);
}

M9::start(false);

$login = false;
$postrec = false;

if (count($_POST) > 0) {
    
    $postrec = true;
    
    if ($_POST["g-recaptcha-response"]) {
        $resp = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }
    
    if ($resp != null && $resp->success || !$recaptchaenabled) {
        $username = filter::username($_POST['username']);
        $password = filter::password($_POST['password']);
        $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($username));
        $userdata = $userdata[0];

        #If login data is recieved
        if ($username == $userdata['username'] && hash('sha256', $password) == $userdata['password'] && $userdata != '') {
            setcookie("username", $username, time()+10000, "/");
            $random = hash('sha256', rand());
            database::preparedInsert("UPDATE  `users` SET  `clientid` =  ? WHERE  `users`.`id` = ?", array($random, $userdata['id']));
            setcookie("clientid", $random, time()+10000, "/");
            header('Location: /M9/');
            $login = true;
        } else {
            include('Forbidden.php');
            $login = false;
            die();
        }
    } else {
        include('ForbiddenCap.php');
        $login = false;
        die();
    }
}

if (count($_COOKIE) > 0) {
    $username = filter::username($_COOKIE['username']);
    $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($username));
    $userdata = $userdata[0];
    #If the user has cookies, this is very likely
    if ($username == $userdata['username'] && filter::password($_COOKIE['clientid']) == $userdata['clientid'] && $userdata != '') {
        $login = true;
    } else {
        $login = false;
    }
}

if ($login) {
    include('Admin.php');
} else {
    if (!$postrec) {
        include('Login.php');
    }
}
M9::loadtime();
?>