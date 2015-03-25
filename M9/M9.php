<?php
#M9 Interaction File
if (file_exists($_SERVER['DOCUMENT_ROOT'].'/M9/config.php')) {
    include($_SERVER['DOCUMENT_ROOT'].'/M9/classes.php');
    include($_SERVER['DOCUMENT_ROOT'].'/M9/config.php');
} else {
    header('Location: http://'.$_SERVER['SERVER_NAME']."/M9/");
}

?>
