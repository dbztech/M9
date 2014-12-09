<!doctype html>
<html>
    <?php  $title = "M9 Login"; include('GenericHead.php'); ?>
    <body>
        <div class="jumbotron">
            <h1>M9 Admin Panel</h1>
            <h2>Login:</h2>
            <form action="/M9/" method="post" class="validate-form">
                <div class="form-group">
                    <input type="email" name="username" class="form-control" placeholder="Email" required />
                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                    <input type="submit" class="btn btn-primary" value="Login" />
                </div>
            </form>
            <script src="validate.js"></script>
        </div>
    </body>
</html>