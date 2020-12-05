<?
namespace app\core;

class Router{

	protected  $routes = [];
	protected  $params = [];

	public function __construct(){
		$routesAr = require 'app/config/routes.php';
		foreach ($routesAr as $key => $value) {
			$this->addRoute($key, $value);
		}
	}

	public function addRoute($route, $params){
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $params;
	}

	public function matchRoute(){
		$url = trim($_SERVER['REQUEST_URI'], '/');
		foreach ($this->routes as $route => $params) {	
			if (preg_match($route, $url, $mathces)) {
				$this->params = $params;
				return true;
			}
		}
		return false;
	}

	public function RunRouter(){
		if($this->matchRoute()){
			$path = 'app\controllers\\'.ucfirst($this->params['CONTROLLER']).'Controller';
			if (class_exists($path)){
				$action = $this->params['ACTION'].'Action';
				if(method_exists($path, $action)){
					$controller = new $path($this->params);
					$controller -> $action();

				} else {
					View::errorCode(404);
				}
			} else {
				View::errorCode(404);
			}
		} else {
			View::errorCode(404);
		}

			
	}

}

?>