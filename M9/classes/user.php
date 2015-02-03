<?php
class user
{
    public static function logout() {
        $user = $_COOKIE['username'];
        database::preparedInsert("UPDATE  `users` SET  `clientid` =  NULL WHERE  `users`.`username` = ?", array($user));
        setcookie('username', '');
        setcookie('clientid', '');
        header('Location: /M9/');
    }
    
    public static function logoutSpecific($user) {
        database::preparedInsert("UPDATE  `users` SET  `clientid` =  NULL WHERE  `users`.`id` = ?", array($user));
        setcookie('username', '');
        setcookie('clientid', '');
    }
    
    public static function delete($user) {
        database::preparedInsert("DELETE FROM `users` WHERE `users`.`id` = ?", array($user));
    }
    
    public static function create($username, $password, $type) {
        if (database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($username))) {
            #echo "User exists";
        } else {
            #echo "Inserted";
            database::preparedInsert("INSERT INTO `users` (`username`, `password`, `clientid`, `type`, `groups`, `gravatar`, `id`) VALUES (?, ?, NULL, ?, NULL, ?, NULL);", array($username, hash('sha512', $username).hash('sha512', $password), $type, md5(strtolower(trim($username)))));
        }
    }
    
    public static function changeUsername($user, $username) {
        if (database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($username))) {
            #echo "User exists";
        } else {
            #echo "Inserted";
            database::preparedInsert("UPDATE  `users` SET  `username` = ? WHERE  `users`.`id` = ?", array($username, $user));
            database::preparedInsert("UPDATE  `users` SET  `gravatar` = ? WHERE  `users`.`id` = ?", array(md5(strtolower(trim($username))), $user));
        }
    }
    
    public static function changePassword($user, $old, $new, $repeat) {
        $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `id` = ?', array($user));
        $userdata = $userdata[0];
        if ($new == $repeat) {
            database::preparedInsert("UPDATE  `users` SET  `password` = ? WHERE  `users`.`id` = ?", array(hash('sha512', $userdata['username']).hash('sha512', $new), $user));
            database::preparedInsert("UPDATE  `users` SET  `clientid` =  NULL WHERE  `users`.`id` = ?", array($user));
        }
    }
    
    public static function changeType($user, $type) {
        database::preparedInsert("UPDATE  `users` SET  `type` = ? WHERE  `users`.`id` = ?", array($type, $user));
    }
    
    public static function getUserType() {
        $userdata = user::getUserData();
        return $userdata['type'];
    }
    
    public static function userList() {
        $userdata = database::select("SELECT * FROM  `users` WHERE 1");
        echo '<input type="hidden" name="clientid" value="'.$_COOKIE['clientid'].'" />';
        foreach ($userdata as $data) {
            echo '<table class="table table-bordered">';
            
            echo '<tr><td>';
            echo '<img alt="Gravatar" class="img-circle" src="http://www.gravatar.com/avatar/'.$data['gravatar'].'" /> <br />';
            echo '<input type="button" class="btn btn-default" value="'.$data['username'].'" onClick="User.username('.$data['id'].')" /> <br />';
            echo '<input type="button" class="btn btn-default" value="Change Password" onClick="User.password('.$data['id'].')" />';
            echo '</td></tr>';
            
            echo '<tr><td>';
            echo '<input type="button" class="btn btn-default" value="'.$data['type'].'" onClick="User.type('.$data['id'].')" />';
            echo '</td></tr>';
            
            echo '<tr><td><div style="height: 225px; width: 100%; overflow: auto;">';
            echo groups::getUser($data['id']);
            echo '</div></td></tr>';
            
            echo '<tr><td>';
            echo '<input type="button" class="btn btn-warning" value="Logout User" onClick="User.logout('.$data['id'].')" />';
            echo '<input type="button" class="btn btn-danger" value="Delete User" onClick="User.delete('.$data['id'].')" />';
            echo '</td></tr>';
            
            echo '</table>';
        }
    }
    
    public static function getGravatar() {
        $userdata = user::getUserData();
        return $userdata['gravatar'];
    }
    
    public static function validateUser() {
        $login = false;
        $postrec = false;
        if (count($_POST) > 0 && filter::username($_POST['username']) != "") {
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
                $userdata = user::getUserData();

                #If login data is recieved
                if ($username == $userdata['username'] && hash('sha512', $username).hash('sha512', $password) == $userdata['password'] && $userdata != '') {
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
            $userdata = user::getUserData();
            #If the user has cookies, this is very likely
            if ($userdata != '' && $username == filter::username($userdata['username']) && filter::password($_COOKIE['clientid']) == $userdata['clientid']) {
                $login = true;
            } else {
                $login = false;
            }
        }
        
        return $login;
    }
    
    public static function getUserData() {
        $username = filter::username($_COOKIE['username']);
        $userdata = database::preparedSelect("SELECT * FROM  `users` WHERE  `username` =  ?", array($username));
        $userdata = $userdata[0];
        return $userdata;
    }
}
?>