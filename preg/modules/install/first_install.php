<?
/**
 * instalation Pekaby
 */
// require '../abstract/db.php';
require_once 'preg/modules/abstract/db.php';
class install extends pekaby_abstract_database
{
    
    function __construct($db)
    {
        $q = $this->instalation_checker();
        if (!$q) {
           $this->frash_install($db);
        }
    }
    private function instalation_checker()
    {
        $f = fopen('preg/modules/install/install.txt', 'r');
        $data = fread($f, 13);
        fclose($f);
        if ($data == true) {
            echo "<b>[WARNING]</b> Set install to true in settings.php";
            return true;
        }else{
            return false;
        }
    }
    private function sql_query_generator($db)
    {
        global $database;

        $query = "CREATE TABLE `$database`.`pekaby_db` ( `id` INT NOT NULL AUTO_INCREMENT , ";
        foreach ($db as $key => $value) {
            $query .= "`$value` TEXT NULL , ";
        }
        $query .= "`salt` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        return $query;
 

    }
    private function frash_install($db)
    {
        $sql = self::sql_query_generator($db);

        self::query($sql);

        $f = fopen('preg/modules/install/install.txt', 'w');
        fwrite($f, "1");
        fclose($f);
        echo "<b>[INFO]</b> Instalation completed successfully.<br>";
        echo "<b>[INFO]</b> Set instalation to true in settings.";

    }
}