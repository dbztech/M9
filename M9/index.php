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

$login = user::validateUser();

if ($login) {
    include('Admin.php');
} else {
    if (!$postrec) {
        include('Login.php');
    }
}
M9::loadtime();
?>