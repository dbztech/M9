<?php include('M9.php');?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>M9 Password Creation Tool</h1>
        <form method="post" action="Password.php">
            <input type="hidden" name="query" value="PasswordHash" />
            <input type="password" name="password" required />
            <input type="submit" />
        </form>
        <?php
            if(count($_POST) > 0) {
                echo "Result: ".hash('sha256', $_POST['password']);
            }
        ?>
    </body>
</html>