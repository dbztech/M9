<?php echo "I'm PHP"; include('M9/M9.php'); M9::authorization(array("conten","website")); ?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h1>Welcome to M9!</h1>
        <h2>You are a special snowflake</h2>
        <?php M9::data('trialcontent'); ?>
    </body>
</html>