<?
/**
 * abstract class for working with data base
 */
include 'preg/settings.php';
abstract class pekaby_abstract_database
{
    public static $connect;
    private static $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
];
    function __construct()
    {

    }

    protected static function query($sql)
    {
        self::connect();
        $stmt = self::$connect->query($sql);
        return $stmt;
    }

    protected static function execute($sql)
    {
        self::connect();
        $stmt = self::$connect->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    private function connect()
    {
        global $dsn;
        global $user;
        global $password;
        global $opt;
        self::$connect = new PDO($dsn, $user, $password, self::$opt);
    }
}