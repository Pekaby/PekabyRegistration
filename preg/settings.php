<?
// --------DATABASE----------//
$db = ['email', 'password', 'name'];    // Desired fields from user

$host = 'localhost';
$user = 'root';
$password = 'toor';
$database = 'testing';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
// --------=DATABASE=----------//

//---------Protection----------//
$salt = "123456qwerty";     //change it for yourself
$csrfprotection = false;    //Cross Site Request Forgery
//---------=Protection=---------//

//----------General----------//
$instalation = false;   //set to true when finished
$redirect_when_finish = '/';    //example '/login', '/profile'. '/' — redirect to index page
//-------=General=---------//
