<?php
include('M9.php');

if (count($_POST) > 0) {
    if (count($_COOKIE) > 0) {
        $userdata = database::select("SELECT * FROM  `users` WHERE  `username` =  '".$_COOKIE['username']."'");
        $userdata = $userdata[0];
        #If the user has cookies, this is very likely
        #Replace with randhash
        if (filter::username($_COOKIE['username']) == $userdata['username'] && filter::password($_COOKIE['clientid']) == $userdata['clientid'] && $userdata != '') {
            #echo $_POST['query'];
            if ($_POST['query'] == "CreateUser") {
                user::create($_POST['username'], $_POST['password'], $_POST['type'], NULL, NULL, NULL);
            } elseif ($_POST['query'] == "ChangeUsername") {
                user::changeUsername($_POST['UserId'], $_POST['new']);
            } elseif ($_POST['query'] == "ChangePassword") {
                user::changePassword($_POST['UserId'], $_POST['old'], $_POST['new'], $_POST['repeat']);
            } elseif ($_POST['query'] == "ChangeType") {
                user::changeType($_POST['UserId'], $_POST['new']);
            }
        }
    }
    
}

if (count($_GET) > 0) {
    if (count($_COOKIE) > 0) {
        $userdata = database::select("SELECT * FROM  `users` WHERE  `username` =  '".$_COOKIE['username']."'");
        $userdata = $userdata[0];
        #If the user has cookies, this is very likely
        #Replace with randhash
        if (filter::username($_COOKIE['username']) == $userdata['username'] && filter::password($_COOKIE['clientid']) == $userdata['clientid'] && $userdata != '') {
            #echo "GET Data";
            $data = explode('_', $_GET['query']);
            if ($data[0] == "Delete") {
                user::delete($data[1]);
            } elseif ($data[0] == "Logout") {
                user::logoutSpecific($data[1]);
            }
        }
    }
}

header('Location: /M9/');
?>