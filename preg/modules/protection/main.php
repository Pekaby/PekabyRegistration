<?
require 'functions.php';
/**
 * protection
 */
class protect
{
    
    function __construct($token)
    {
        // $this->token_checker($token);
    }
    public static function token_checker($token)
    {
        global $_SESSION;
        $token_ss = $_SESSION['csrf_token'];
        if ($token == $token_ss) {
            return true;
        }else{
            return false;
        }
    }
}