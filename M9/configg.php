<?php
#Database configuration
#User, Password, Host, Database, Prefix (Not Used)
database::setcredentials('root', 'Paquaallpro34', 'localhost', 'm9');

// reCAPTCHA Configuration
$recaptchaenabled = true;
// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = "6Ldq_PUSAAAAABlShLeECiq8ZyViLZahZOyXiiyn";
$secret = "6Ldq_PUSAAAAADpPB_pihieXkaz3-33xYb3brfuA";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "en";
?>