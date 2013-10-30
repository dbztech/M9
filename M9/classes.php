<?php
#M9 Classes
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
            
            echo "<!-- Page powered my M9 CMS by DBZ Technology -->\n";
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
            echo '<link href="/M9/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">';
            echo '<script src="/M9/bootstrap/js/bootstrap.min.js"></script>';
        } else if ($frameworkname == "jQuery") {
            echo '<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>';
        } else if ($frameworkname == "TinyMCE") {
            echo '<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>';
        }
    }
}


#Basic database interaction class
class database
{
	#initialize variables. These are later changed in settings.php
    static protected $dbuser = 'scoutinguser';
    static protected $dbpassword = 'hunter3';
    #Do Not Set to localhost, does not work in all environments
    static protected $dbhost = '127.0.0.1';
    static protected $database = 'scouting2013';
    static protected $prefix = '';

	public static function setcredentials($user, $password, $host = '127.0.0.1', $db = 'M9', $pre = '') {
    	// property declaration
    	$result = 'Credential(s) not set: ';
    	$error = 0;
    	if (is_string($user)) {
	    	database::$dbuser = $user;
	    } else {
    		$error = 1;
    		$result .= '$dbuser ';
    	}
    	
    	if (is_string($password)) {
	    	database::$dbpassword = $password;
	    } else {
    		$error = 1;
    		$result .= '$dbpassword ';
    	}
    	
    	if (!$error) {
    		database::$dbhost = $host;
    		database::$database = $db;
    		database::$prefix = $pre;
	    	$result = 'Success!';
	    } else {
	    	$result = 'Error!';
	    }

    	return $result;
    }
    
    public static function sqlconn() {	
		try {
    		$dbh = new PDO('mysql:host='.database::$dbhost.';dbname='.database::$database, database::$dbuser, database::$dbpassword);
    	}
    	catch (PDOException $e) {
			print ("Could not connect to server.n");
			die ("getMessage(): " . $e->getMessage () . "n");
		}
        #$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        #$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbh;
	}

    // method declaration
    public static function info() {
    	echo "Database: ".database::$database."<br />";
        echo "Database User: ".database::$dbuser."<br />";
        echo "Database Host: ".database::$dbhost."<br />";
        echo "Database Prefix: ".database::$prefix."<br />";
    }

    public static function test() {
    	$dbh = database::sqlconn();
    	if ($dbh) {
            echo "Connection Successful!";
    		return true;
    		$dbh = NULL;
    	}
    	else {
    		return false;
    	}
    }

    public static function select($query) {
    	$dbh = database::sqlconn();

		$result = $dbh->query ($query);
        
        if ($result) {
            return $result->fetchAll();
        }

		$dbh = NULL;
    }

    public static function insert($query) {
    	$dbh = database::sqlconn();

		// Perform Query
		try {
			$result = $dbh->exec ($query);
		}

		// Check result
		// This shows the actual query sent to MySQL, and the error. Useful for debugging.
  		catch (PDOException $e) {
			print ("Could not connect to server.n");
			die ("getMessage(): " . $e->getMessage () . "n");
		}

		return("Query Successful");

		$dbh = NULL;
    }
    
    public static function preparedSelect($base, $prepared) {
        $dbh = database::sqlconn();
        $sth = $dbh->prepare($base);
        $sth->execute($prepared);
        $output = $sth->fetchAll();
        return $output;
    }
    
    public static function preparedInsert($base, $prepared) {
        $dbh = database::sqlconn();
        $sth = $dbh->prepare($base);
        $sth->execute($prepared);
    }
}

class user
{
    public static function logout() {
        $user = $_COOKIE['username'];
        database::preparedInsert("UPDATE  `m9`.`users` SET  `clientid` =  NULL WHERE  `users`.`username` = ?", array($user));
        setcookie('username', '');
        setcookie('clientid', '');
        header('Location: /M9/');
    }
    
    public static function logoutSpecific($user) {
        database::preparedInsert("UPDATE  `m9`.`users` SET  `clientid` =  NULL WHERE  `users`.`id` = ?", array($user));
        setcookie('username', '');
        setcookie('clientid', '');
    }
    
    public static function delete($user) {
        database::preparedInsert("DELETE FROM `m9`.`users` WHERE `users`.`id` = ?", array($user));
    }
    
    public static function create($username, $password, $type, $groups, $gravatar) {
        if (database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($username))) {
            #echo "User exists";
        } else {
            #echo "Inserted";
            database::preparedInsert("INSERT INTO `m9`.`users` (`username`, `password`, `clientid`, `type`, `groups`, `gravatar`, `id`) VALUES (?, ?, NULL, ?, NULL, ?, NULL);", array($username, hash('sha256', $password), $type, md5(strtolower(trim($username)))));
        }
    }
    
    public static function changeUsername($user, $username) {
        if (database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($username))) {
            #echo "User exists";
        } else {
            #echo "Inserted";
            database::preparedInsert("UPDATE  `m9`.`users` SET  `username` = ? WHERE  `users`.`id` = ?", array($username, $user));
            database::preparedInsert("UPDATE  `m9`.`users` SET  `gravatar` = ? WHERE  `users`.`id` = ?", array(md5(strtolower(trim($username))), $user));
        }
    }
    
    public static function changePassword($user, $old, $new, $repeat) {
        $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `id` = ?', array($user));
        $userdata = $userdata[0];
        if ($new == $repeat) {
            database::preparedInsert("UPDATE  `m9`.`users` SET  `password` = ? WHERE  `users`.`id` = ?", array(hash('sha256', $new), $user));
            database::preparedInsert("UPDATE  `m9`.`users` SET  `clientid` =  NULL WHERE  `users`.`id` = ?", array($user));
        }
    }
    
    public static function changeType($user, $type) {
        database::preparedInsert("UPDATE  `m9`.`users` SET  `type` = ? WHERE  `users`.`id` = ?", array($type, $user));
    }
    
    public static function getUserType() {
        $user = $_COOKIE['username'];
        $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($user));
        $userdata = $userdata[0];
        return $userdata['type'];
    }
    
    public static function userList() {
        $userdata = database::select("SELECT * FROM  `users` WHERE 1");
        echo '<input type="hidden" name="clientid" value="'.$_COOKIE['clientid'].'" />';
        echo '<table class="table table-bordered">';
        echo '<th>Username</th><th>Password</th><th>User Type</th><th>Groups</th><th>Gravatar</th><th>Logout User</th>';
        foreach ($userdata as $data) {
            echo '<tr>';
            echo '<td><input type="button" class="btn btn-default" value="'.$data['username'].'" onClick="User.username('.$data['id'].')" /></td>';
            echo '<td><input type="button" class="btn btn-default" value="Change Password" onClick="User.password('.$data['id'].')" /></td>';
            echo '<td><input type="button" class="btn btn-default" value="'.$data['type'].'" onClick="User.type('.$data['id'].')" /></td>';
            echo '<td>';
            echo groups::getUser($data['id']);
            echo '</td>';
            echo '<td><img alt="Gravatar" class="img-circle" src="http://www.gravatar.com/avatar/'.$data['gravatar'].'" /></td>';
            echo '<td><input type="button" class="btn btn-warning" value="Logout User" onClick="User.logout('.$data['id'].')" /></td>';
            echo '<td><input type="button" class="btn btn-danger" value="X" onClick="User.delete('.$data['id'].')" /></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    public static function getGravatar() {
        $user = $_COOKIE['username'];
        $userdata = database::preparedSelect('SELECT *  FROM `users` WHERE `username` = ?', array($user));
        $userdata = $userdata[0];
        return $userdata['gravatar'];
    }
}

class data
{
    public static function getData($tag) {
        $data = database::preparedSelect("SELECT * FROM  `data` WHERE  `tag` =  ?", array($tag));
        $data = $data[0];
        return $data['data'];
    }
    
    public static function dataList() {
        $listdata = database::select("SELECT * FROM  `data` WHERE 1");
        echo '<input type="hidden" name="clientid" value="'.$_COOKIE['clientid'].'" />';
        echo '<table class="table table-bordered">';
        echo '<th>Tag</th><th>Data</th><th>Data Modified</th>';
        foreach ($listdata as $data) {
            echo '<tr>';
            echo '<td><input type="button" class="btn btn-default" value="'.$data['tag'].'" onClick="Data.tag('.$data['id'].')" /></td>';
            echo '<td id="'.$data['id'].'">'.$data['data'].'</td>';
            echo '<td>'.$data['timestamp'].'</td>';
            echo '<td><input type="button" class="btn btn-primary" value="Edit" onClick="Data.edit('.$data['id'].')" /></td>';
            echo '<td><input type="button" value="X" class="btn btn-danger" onClick="Data.delete('.$data['id'].')" /></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    public static function createData($tag, $data) {
        $sql = "INSERT INTO `m9`.`data` (`tag`, `data`, `timestamp`, `id`) VALUES (?, ?, CURRENT_TIMESTAMP, NULL);";
        if (database::preparedSelect("SELECT * FROM `m9`.`data` WHERE `users`.`tag` = ?", array($tag))) {
            #echo "Tag exists";
        } else {
            #echo "Inserted";
            database::preparedInsert($sql, array($tag, $data));
        }
    }
    
    public static function changeTag($id, $new) {
        if (database::preparedSelect("SELECT * FROM `m9`.`data` WHERE `data`.`tag` = ?", array($tag))) {
            #echo "Tag exists";
        } else {
            #echo "Inserted";
            database::preparedInsert("UPDATE  `m9`.`data` SET  `tag` =  ? WHERE  `data`.`id` = ?", array($new, $id));
        }
    }
    
    public static function changeData($id, $new) {
        database::preparedInsert("UPDATE  `m9`.`data` SET  `data` =  ? WHERE  `data`.`id` = ?", array($new, $id));
    }
    
    public static function delete($tag) {
        database::preparedInsert("DELETE FROM `m9`.`data` WHERE `data`.`id` = ?", array($tag));
    }
}

class cards 
{
    public static function loadCards($cardsToLoad) {
        foreach($cardsToLoad as $currentCard) {
            $filename = "Cards/".$currentCard.".php";
            if ($currentCard == "Data" || $currentCard == "Users") {
                echo '<div class="card homeviews" id="'.$currentCard.'">';
            } else {
                echo '<div class="card" id="'.$currentCard.'">';
            }
            
            #echo $filename;
            if (file_exists($filename)) {
                include($filename);
    	    }
            echo '</div>';
        }
    }
    
    public static function adminPanel() {
        $type = user::getUserType();
        if ($type == "admin") {
            $cards = Array('Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag', 'Users', 'ChangeUsers', 'CreateUsers', 'ChangeUsername', 'ChangeUserPassword', 'ChangeUserType');
        } elseif ($type == "standard") {
            $cards = Array('Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag');
        }
        cards::loadCards($cards);
    }
}


class devmode
{
    public static function enable($newPage) {
        if (count($_COOKIE) > 0) {
            $username = filter::username($_COOKIE['username']);
            $userdata = database::preparedSelect("SELECT * FROM  `users` WHERE  `username` =  ?", array($username));
            $userdata = $userdata[0];
            #If the user has cookies, this is very likely
            if ($username == $userdata['username'] && filter::password($_COOKIE['clientid']) == $userdata['clientid'] && $userdata != '') {
                header('Location: '.$newPage);
            }
        }
    }
}


class groups
{
    public static function get($user) {
        $sql = "SELECT `groups` FROM `users` WHERE `id` = ?";
        $output = database::preparedSelect($sql, array($user));
        $output = $output[0];
        $output = $output['groups'];
        $output = explode("|", $output);
        return $output;
    }
    
    public static function getUser($user) {
        $input = groups::get($user);
        foreach ($input as $group) {
            if ($group != "") {
                echo '<input type="button" class="btn btn-default" value="#'.$group.'" onClick="" />';
                echo "<br />";
            } else {
                echo '<input type="button" class="btn btn-default" value="#nothing" onClick="" disabled />';
                echo "<br />";
            }
        }
        echo "<br />";
        echo '<input type="button" class="btn btn-success" value="Add Group" onClick="" />';
    }
    
    public static function set($user, $groups) {
    }
    
}


class filter
{
    public static function username($input) {
        #mysql_real_escape_string($input);
        $output = filter_var($input, FILTER_VALIDATE_EMAIL);
        return $output;
    }
    
    public static function password($input) {
        #mysql_real_escape_string($input);
        return $input;
    }
}

?>