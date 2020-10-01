<?
/**
 * system functions for project
 */
include "abstract/db.php";
include "preg/settings.php";
class system extends pekaby_abstract_database
{

    public static function dumb($var)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
    public static function random_str($value=30)
    {
        return substr(str_shuffle('0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $value);
    }
}