<!doctype>
<html>
    <?php  $title = "M9 Setup"; include('../GenericHead.php'); ?>
    
    <body>
        <div class="jumbotron">
            <h1>M9 Setup</h1>
            <hr />
            <h2>1. Prepare Database</h2>
            <ol style="text-align: left; width: 70%; margin: auto;">
                <li>Create a database for M9 to use</li>
                <li>Create a user with <b>NO</b> global permissions</li>
                <li>Grand this user database specific permission to the M9 database</li>
                <li>Enter the username and database info below</li>
            </ol>
            <form method="post" action="Process.php" target="_blank">
                <h2><b>2. Enter Database Information</b></h2>
                <div class="form-group">
                    <input type="text" placeholder="Database Host" class="form-control" name="dbhost" autocomplete="off" required />
                    <input type="text" placeholder="Database Name" class="form-control" name="dbname" autocomplete="off" required />
                    <input type="text" placeholder="Database User" class="form-control" name="dbusername" autocomplete="off" required />
                    <input type="password" placeholder="Database Password" class="form-control" name="dbpassword" autocomplete="off" required />
                </div>
                <h2><b>2. Create an administrator account</b></h2>
                <div class="form-group">
                    <input type="email" placeholder="Email" name="username" class="form-control" required />
                    <input type="password" placeholder="Password" name="password" class="form-control" required />
                    <input type="submit" class="btn btn-primary" onclick="Core.showId('continueButton');" value="Setup M9" />
                </div>
            </form>
            <input type="button" value="Continue..." id="continueButton" onclick="window.location = '/M9/Setup/Finalize.php';" class="btn btn-success" style="display: none; margin: auto;" />
        </div>
    </body>
</html>
