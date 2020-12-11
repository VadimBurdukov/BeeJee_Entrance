<?
namespace app\core;

class View{

	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route){
		$this->route = $route;
		$this->path = $route['CONTROLLER'].'/'.$route['ACTION'];
	}

	public function render($title, $vars = []){
		extract($vars);
		if(file_exists('app/views/'.$this->path.'.php')){
			ob_start();
			include 'app/views/'.$this->path.'.php';
			$content = ob_get_clean();
			include 'app/views/layouts/'.$this->layout.'.php';
		}
	}

	public static function errorCode($code){
		http_response_code($code);
		require 'app/views/errors/'.$code.'.php';
		exit;
	}

	public function message($message) {
		exit(json_encode(['message' => $message]));
	}

	public function location($url) {
		exit(json_encode(['url' => $url]));
	}

	public function redirect($url) {
		header('location: '.$url);
		exit;
	}

}
?>