<?php
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