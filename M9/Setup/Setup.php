<!doctype>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1">
        <script src="/M9/jquery/jquery.min.js"></script>
        <link href="/M9/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="/M9/bootstrap/js/bootstrap.min.js"></script>
        <script src="/M9/tinymce/tinymce.min.js"></script>
        <link rel="stylesheet" href="/M9/styles.css" />
        <script type="text/javascript" src="/M9/scripts.js"></script>
        <link rel="shortcut icon" href="/M9/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/M9/favicon.ico" type="image/x-icon">
        <title>M9 Setup</title>
    </head>
    
    <body>
        <div class="jumbotron">
            <h1>M9 Setup</h1>
            <hr />
            <h2>1. Prepare Database</h2>
            <h2><b>2. Enter Database Information</b></h2>
            <div class="form-group">
                <form method="post" action="Process.php">
                    <input type="text" placeholder="Database User" class="form-control" name="dbusername" autocomplete="off" required />
                    <input type="password" placeholder="Database Password" class="form-control" name="dbpassword" autocomplete="off" required />
                    <input type="submit" class="btn btn-primary" value="Setup M9" />
                </form>
            </div>
        </div>
    </body>
</html>