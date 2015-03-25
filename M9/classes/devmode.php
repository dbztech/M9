<?php
class devmode
{
    public static function enable($newPage) {
        if (count($_COOKIE) > 0) {
            $username = filter::username($_COOKIE['username']);
            $userdata = database::preparedSelect("SELECT * FROM  `users` WHERE  `username` =  ?", array($username));
            $userdata = $userdata[0];
            #If the user has cookies, this is very likely
            if ($username == $userdata['username'] && filter::password($_COOKIE['clientid']) == $userdata['clientid'] && $userdata != '') {
                header('Location: http://'.$_SERVER['SERVER_NAME']."/".$newPage);
            }
        }
    }
}
?>