<?
require_once 'preg/modules/system.php';
function csrf_get_token()
{
    global $_SESSION;
    $token = system::random_str(250);
    $_SESSION['csrf_token'] = $token;
}
function csrf_field()
{
    global $_SESSION;
    echo "<input type=\"hidden\" name=\"p-direct[token]\" value=".$_SESSION['csrf_token'].">";
}