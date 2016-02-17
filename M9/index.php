<?php
#This file handled login information and load admin panel
include('M9.php');

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