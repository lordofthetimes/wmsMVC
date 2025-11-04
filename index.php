<?php
session_start();
require_once("config.php");
/*
function __autoload($class) {
	require LIBRARY . $class .".php";
}
*/
spl_autoload_register(function ($class) {
    require LIBRARY . $class . ".php";
});

$app = new Bootstrap();

?>
