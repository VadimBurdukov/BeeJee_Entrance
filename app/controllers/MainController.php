<?
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;


class MainController extends Controller{	
	public function indexAction(){
		$result = $this->model->getTasks();
		$vars = [
			'tasks' => $result
		];
		$this->view->render('Главная', $vars);
	}

}
?>