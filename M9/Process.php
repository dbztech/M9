<?php
include('M9.php');

$username = filter::username($_COOKIE['username']);
$clientid = filter::password($_COOKIE['clientid']);
$userdata = user::getUserData();

if (count($_POST) > 0) {
    if (count($_COOKIE) > 0) {
        $login = user::validateUser();
        #If the user has cookies, this is very likely
        if ($login) {
            if ($userdata['type'] == "admin") {
                if ($_POST['query'] == "CreateUser") {
                    user::create($_POST['username'], $_POST['password'], $_POST['type']);
                } elseif ($_POST['query'] == "ChangeUsername") {
                    user::changeUsername($_POST['UserId'], $_POST['new']);
                } elseif ($_POST['query'] == "ChangePassword") {
                    user::changePassword($_POST['UserId'], $_POST['old'], $_POST['new'], $_POST['repeat']);
                } elseif ($_POST['query'] == "ChangeType") {
                    user::changeType($_POST['UserId'], $_POST['new']);
                } elseif ($_POST['query'] == "RemoveGroup") {
                    groups::removeGroup($_POST['UserId'], $_POST['group']);
                } elseif ($_POST['query'] == "AddGroup") {
                    groups::addGroup($_POST['UserId'], $_POST['group']);
                }
            }
            
            if ($_POST['query'] == "CreateData") {
                data::createData($_POST['tag'], $_POST['data']);
            } elseif ($_POST['query'] == "ChangeData") {
                data::changeData($_POST['DataId'], $_POST['new']);
            } elseif ($_POST['query'] == "ChangeTag") {
                data::changeTag($_POST['DataId'], $_POST['new']);
            }
        }
    }
    
}

if (count($_GET) > 0) {
    if (count($_COOKIE) > 0) {
        #If the user has cookies, this is very likely
        $login = user::validateUser();
        
        if ($login) {
            #echo "GET Data";
            $data = explode('_', $_GET['query']);
            
            if ($userdata['type'] == "admin") {
                if ($data[0] == "DeleteUser") {
                    user::delete($data[1]);
                } elseif ($data[0] == "LogoutUser") {
                    user::logoutSpecific($data[1]);
                }
            }
            
            if ($data[0] == "DeleteData") {
                data::delete($data[1]);
            }
        } else {
            include('Forbidden.php');
            die();
        }
    }
}

header('Location: http://'.$_SERVER['SERVER_NAME']."/M9/");
?>