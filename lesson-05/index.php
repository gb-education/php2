<?

session_start();

//echo $_GET['path'];

$_SESSION["pages"][] = $_GET;

var_dump($_SESSION);