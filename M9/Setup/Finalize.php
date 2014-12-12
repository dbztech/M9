<!doctype>
<html>
    <?php  $title = "M9 Setup"; include('../GenericHead.php'); ?>
    
    <body>
        <div class="jumbotron">
            <h1>M9 Setup</h1>
            <hr />
            <h2><b>4. Add Code to Page</b></h2>
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
            <h2><b>5. Add the config.php File to the M9 Directory</b></h2>
            <br />
            <p>Place the file that was downloaded into the M9 directory then click the button bellow.</p>
            <input type="button" class="btn btn-primary" value="Enter M9" onclick="window.location = '/M9/'" />
        </div>
    </body>
</html>