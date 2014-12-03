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
            database::preparedInsert("INSERT INTO `users` (`username`, `password`, `clientid`, `type`, `groups`, `gravatar`, `id`) VALUES (?, ?, NULL, ?, NULL, ?, NULL);", array($username, hash('sha256', $password), $type, md5(strtolower(trim($username)))));
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
            database::preparedInsert("UPDATE  `users` SET  `password` = ? WHERE  `users`.`id` = ?", array(hash('sha256', $new), $user));
            database::preparedInsert("UPDATE  `users` SET  `clientid` =  NULL WHERE  `users`.`id` = ?", array($user));
        }
    }
    
    public static function changeType($user, $type) {
        database::preparedInsert("UPDATE  `users` SET  `type` = ? WHERE  `users`.`id` = ?", array($type, $user));
    }
    
    public static function getUserType() {
        $user = $_COOKIE['username'];
        $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($user));
        $userdata = $userdata[0];
        return $userdata['type'];
    }
    
    public static function userList() {
        $userdata = database::select("SELECT * FROM  `users` WHERE 1");
        echo '<input type="hidden" name="clientid" value="'.$_COOKIE['clientid'].'" />';
        foreach ($userdata as $data) {
            echo '<table class="table table-bordered usertable">';
            
            echo '<tr>';
            echo '<td><img alt="Gravatar" class="img-circle" src="http://www.gravatar.com/avatar/'.$data['gravatar'].'" /> <br />';
            echo '<input type="button" class="btn btn-default" value="'.$data['username'].'" onClick="User.username('.$data['id'].')" />';
            echo '<input type="button" class="btn btn-default" value="Change Password" onClick="User.password('.$data['id'].')" /></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><input type="button" class="btn btn-default" value="'.$data['type'].'" onClick="User.type('.$data['id'].')" /></td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td>';
            echo groups::getUser($data['id']);
            echo '</td>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td><input type="button" class="btn btn-warning" value="Logout User" onClick="User.logout('.$data['id'].')" />';
            echo '<input type="button" class="btn btn-danger" value="Delete User" onClick="User.delete('.$data['id'].')" /></td>';
            echo '</tr>';
            
            echo '</table>';
        }
    }
    
    public static function getGravatar() {
        $user = $_COOKIE['username'];
        $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($user));
        $userdata = $userdata[0];
        return $userdata['gravatar'];
    }
}
?>