<?

ini_set('display_errors', 1);
error_reporting(E_ALL);

define("taskPerPage", 10);

function debug($str){
	echo '<pre>';
		var_dump($str);
	echo '</pre>';
	exit;
}

?>