<?php
include('../classes.php');
$host = $_POST['dbhost'];
$database = $_POST['dbname'];
$username = $_POST['dbusername'];
$password = $_POST['dbpassword'];

database::setcredentials($username, $password, $host, $database);
if (database::test()) {
    database::insert("CREATE TABLE IF NOT EXISTS `data` (`tag` text NOT NULL COMMENT 'Name of the variable', `data` longtext NOT NULL COMMENT 'Data or value of the variable', `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date modified',`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Variable id',PRIMARY KEY (`id`),UNIQUE KEY `id` (`id`),KEY `timestamp` (`timestamp`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;");
    database::insert("CREATE TABLE IF NOT EXISTS `users` (`username` text NOT NULL COMMENT 'User name',`password` text NOT NULL COMMENT 'User password',`clientid` text COMMENT 'Session token',`type` text NOT NULL COMMENT 'User type',`groups` longtext COMMENT 'User groups (array)',`gravatar` text COMMENT 'Gravatar data',`id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User Identifier',PRIMARY KEY (`id`),UNIQUE KEY `id` (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15;");
    user::create($_POST['username'], $_POST['password'], 'admin');
    
    $str = '<?php
#Database configuration
#User, Password, Host, Database, Prefix (Not Used)
database::setcredentials("'.$username.'", "'.$password.'", "'.$host.'", "'.$database.'");
// reCAPTCHA Configuration
$recaptchaenabled = false;
// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = "";
$secret = "";
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "en";
?>';

    header('Content-Disposition: attachment; filename="config.php"');
    header('Content-Type: text/plain'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
    header('Content-Length: ' . strlen($str));
    header('Connection: close');


    echo $str;
}
?>