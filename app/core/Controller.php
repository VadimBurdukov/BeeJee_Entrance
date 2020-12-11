<?
namespace app\core;
use app\core\View;


abstract class Controller{
	public $route;
	public $view;
	public $model;
	public $acl;

	public function __construct($route){
		$this->route = $route;
		$this->view = new View($route);

		if(!$this->checlAcl()){
			$this->view->errorCode(403);
		}
		
		$this->model = $this->loadModel($route['CONTROLLER']);
	}

	public function loadModel($name){
		$path = 'app\models\\'.ucfirst($name);
		if(class_exists($path)){
			return new $path;
		}
		else
			exit('no model');
	}

	public function checlAcl(){
		$this->acl = require 'app/acl/'.$this->route['CONTROLLER'].'.php';
		$this->acl;
		if($this->isAcl('all')){
			return true;
		}
		elseif(isset($_SESSION['ADMIN_FLAG']) && $this->isAcl('admin')){
			return true;
		}
		return false;
	}

	public function isAcl($key){
		return in_array($this->route['ACTION'], $this->acl[$key]);
	}
}
?>