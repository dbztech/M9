<?php
class M9
{
    static protected $time = NULL;
    
    public static function start($input = true) {
        M9::info($input);
    }
    
    public static function data($name) {
        echo data::getData($name);
    }
    
    public static function devmode($page) {
        devmode::enable($page);
    }
    
    public static function info($output) {
        M9::$time = microtime(true);
        if ($output) {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                #Windows machine, do nothing
            } else {
                $load = sys_getloadavg();
                echo '<!-- Server load: Last minute: '.$load[0].', Last 5 minutes: '.$load[1].', Last 15 minutes: '.$load[2]."-->\n";
            }
            
            echo "<!-- Page powered by M9 CMS a DBZ Technology Product -->\n";
        }
    }
    
    public static function loadtime() {
        echo "\n<!-- Page generation time: ".(microtime(true) - M9::$time)."s-->";
    }
    
    public static function authorization($groups) {
        if (count($_COOKIE) > 0) {
            $username = filter::username($_COOKIE['username']);
            $userdata = database::preparedSelect("SELECT * FROM  `users` WHERE  `username` =  ?", array($username));
            $userdata = $userdata[0];
            #If the user has cookies, this is very likely
            $authorized = false;
            $loggedin = false;
            if ($username == $userdata['username'] && filter::password($_COOKIE['clientid']) == $userdata['clientid'] && $userdata != '') {
                $loggedin = true;
                $usergroups = groups::get($userdata['id']);
                foreach($groups as $check) {
                    foreach($usergroups as $against) {
                        if ($check == $against) {
                            $authorized = true;
                        }
                    }
                }
            }
            
            if (!$authorized) {
                header('HTTP/1.0 401 Unauthorized');
                if ($loggedin) {
                    echo "You are not authorized to access this page! Login with a different M9 account and try again.";
                } else {
                    header('Location: /M9/');
                }
                die();
            }
        }
    }
    
    public static function addframework($frameworkname) {
        if ($frameworkname == "Bootstrap") {
            echo '<link href="/M9/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">'."\n";
            echo '<script src="/M9/bootstrap/js/bootstrap.min.js"></script>'."\n";
        } else if ($frameworkname == "jQuery") {
            echo '<script src="/M9/jquery/jquery.min.js"></script>'."\n";
            echo '<script src="/M9/jquery/jquery.fittext.js"></script>'."\n";
        } else if ($frameworkname == "TinyMCE") {
            echo '<script src="/M9/tinymce/tinymce.min.js"></script>'."\n";
        } else if ($frameworkname == "Less") {
            echo '<script src="less.min.js"></script>'."\n";
        }
    }
}
?>