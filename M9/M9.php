<?php
#M9 Interaction File
if (file_exists($_SERVER['DOCUMENT_ROOT'].'/M9/config.php')) {
    include('classes.php');
    include('config.php');
} else {
    header('Location: /M9/Setup/');
}

?>