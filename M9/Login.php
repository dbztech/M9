<!doctype html>
<html>
    <head>
        <link href="/M9/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="styles.css" />
        <script src="/M9/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts.js"></script>
    </head>
    <body style="background-color: #eee;">
        <div class="hero-unit">
            <h1>M9 Admin Panel</h1>
            <h2>Login:</h2>
            <form action="/M9/" method="post">
                <input type="email" name="username" placeholder="Email" required /><br />
                <input type="password" name="password" placeholder="Password" required /><br />
                <input type="submit" class="btn btn-primary" value="Login" />
            </form>
        </div>
    </body>
</html>