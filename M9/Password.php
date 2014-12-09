<!-- This should NEVER be public -->
<!-- Use your web configuration to hide this file unless browsed from inside of your network -->
<?php include('M9.php'); M9::authorization(array("hash")); ?>
<!doctype html>
<html>
    <?php $title = "M9 Hash Generation Tool"; include('GenericHead.php'); ?>
    <body>
        <div class="jumbotron">
        <h1 class="">M9 Password Creation Tool</h1>
            <form method="post" action="Password.php">
                <div class="form-group">
                    <input type="hidden" name="query" value="PasswordHash" />
                    <input type="password" name="password" class="form-control" required />
                    <input type="submit" class="form-control" />
                </div>
            </form>
            <?php
                if(count($_POST) > 0) {
                    echo "Result: ".hash('sha256', $_POST['password']);
                }
            ?>
        </div>
    </body>
</html>