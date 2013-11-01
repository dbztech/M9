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
            <h2><b>3. Add Code to Page</b></h2>
            <br />
            <blockquote>&lt;?php ... ?&gt;</blockquote>
            <p>Welcome to M9! The above code is called PHP. Because you can load this page, your server supports php and you can use this code in your HTML documents to invoke M9.</p>
            <br />
            <h3>Installing M9</h3>
            <blockquote>&lt;?php include('M9/M9.php'); M9::start(); ?&gt;</blockquote>
            <p>Use the above code <b>at the top</b> of every page to start M9. If you have a header file that gets included on every page, you may include it there too.</p>
            <br />
            <h3>Link to Content</h3>
            <blockquote>&lt;?php M9::data('<i>yourtag</i>'); ?&gt;</blockquote>
            <p>Use the above code wherever you want to link to M9 content on your page. Replace the text in italics with your tag name.</p>
            <br />
            <h2><b>4. Add the config.php File to the M9 Directory</b></h2>
            <br />
            <p>Place the file that was downloaded into the M9 directory then click the button bellow.</p>
            <input type="button" class="btn btn-primary" value="Enter M9" onclick="window.location = '/M9/'" />
        </div>
    </body>
</html>