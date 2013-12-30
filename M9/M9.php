<?php
#M9 Interaction File
if (file_exists($_SERVER['DOCUMENT_ROOT'].'/M9/config.php')) {
    include($_SERVER['DOCUMENT_ROOT'].'/M9/classes.php');
    include($_SERVER['DOCUMENT_ROOT'].'/M9/config.php');
} else {
    header('Location: /M9/Setup/');
}

?>
