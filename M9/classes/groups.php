<?php
class groups
{
    public static function get($user) {
        $sql = "SELECT `groups` FROM `users` WHERE `id` = ?";
        $output = database::preparedSelect($sql, array($user));
        $output = $output[0];
        $output = $output['groups'];
        $output = explode("|", $output);
        return $output;
    }
    
    public static function getUser($user) {
        $input = groups::get($user);
        foreach ($input as $group) {
            if ($group != "") {
                echo '<input type="button" class="btn btn-default" value="#'.$group.'" onClick="User.removeGroup('."'".$user."','".$group."'".');" />';
                echo "<br />";
            } else {
                echo '<input type="button" class="btn btn-default" value="#nothing" onClick="" disabled />';
                echo "<br />";
            }
        }
        echo "<br />";
        echo '<input type="button" class="btn btn-success" value="Add Group" onClick="User.addGroup('.$user.')" />';
    }
    
    public static function set($user, $groups) {
        $imploded = implode("|", $groups);
        database::preparedInsert("UPDATE  `users` SET  `groups` =  ? WHERE  `users`.`id` = ?", array($imploded, $user));
    }
    
    public static function removeGroup($user, $grouptoremove) {
        $current = groups::get($user);
        $i = 0;
        foreach($current as $value) {
            if ($value == $grouptoremove) {
                unset($current[$i]);
            }
            $i++;
        }
        $new = array_values($current);
        groups::set($user, $new);
    }
    
    public static function addGroup($user, $grouptoadd) {
        $current = groups::get($user);
        if ($current[0] == "") {
            $current[0] = $grouptoadd;
        } else {
            array_push($current, $grouptoadd);
        }
        
        $new = $current;
        groups::set($user, $new);
    }
    
}
?>