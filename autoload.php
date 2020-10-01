<?
session_start();
require 'preg/modules/system.php';
require 'preg/modules/engine.php';
require 'preg/settings.php';

if ($csrfprotection == true) {
    require 'preg/modules/protection/main.php';
}

if ($instalation == false) {
    require 'preg/modules/install/first_install.php';
    new install($db);
}
if (isset($_POST['p-direct']) || isset($_GET['p-direct'])) {

    if (isset($_POST['p-direct'])) {
        $val = $_POST['p-direct'];
    }else {
        $val = $_GET['p-direct'];
    }
    if ($csrfprotection == true) {
        require_once 'preg/modules/protection/main.php';
        $pass = protect::token_checker($val['token']);
        var_dump($pass);
        if ($pass) {
            $working = engine::to_hash($val);
            unset($working['token']);
            $ex = engine::db_writer($working);
            header("Location: $redirect_when_finish");
        }else{
            return false;
        }
    }else{
        $working = engine::to_hash($val);
        unset($working['token']);
        $ex = engine::db_writer($working);
        header("Location: $redirect_when_finish");
    }

}
?>