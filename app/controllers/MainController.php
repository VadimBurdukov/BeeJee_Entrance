<?
namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\lib\Pagination;


class MainController extends Controller{	

	public function indexAction(){
		if (!empty($_POST))	{
			$_SESSION['SORT_BY'] = $_POST['sort-by'];
			$_SESSION['SORT_DIRECTION'] = $_POST['sort-direction'];
			$this->view->location('/');
		}

		if(isset($_SESSION['ADMIN_FLAG'])){
			$vars = [
				'adminFlag' => $_SESSION['ADMIN_FLAG'],
				'adminName' => $_SESSION['ADMIN_NAME'],
			];
		}

		$sortParams['SORT_BY'] = $_SESSION['SORT_BY'] ?? 'id';
		$sortParams['SORT_DIRECTION'] = $_SESSION['SORT_DIRECTION'] ?? 'ASC';
		
		$pagination = new Pagination($this->route,  $this->model->getPageCount());
		$tasks = $this->model->getTasks($this->route, $pagination->taskPerPage, $sortParams);

		$vars['tasks'] = $tasks;
		$vars['pagination'] = $pagination->getPagination();

		$this->view->render('Список задач', $vars);
	}

	public function loginAction(){
		if (!empty($_POST))	{						$erFlag = false;			$errors = null;
			if(empty($_POST['login'])){				$errors.="Поле Логин не может быть пустым";				$erFlag = true;			}			if(empty($_POST['pwd'])){				$errors.="Поле Пароль не может быть пустым";				$erFlag = true;			}						if($erFlag)				$this->view->message($errors);			
			$_POST['login'] = htmlspecialchars($_POST['login']);
			$_POST['pwd'] = htmlspecialchars($_POST['pwd']);

			$adminValidate = $this->model->adminValidate($_POST['login'], $_POST['pwd']);
			if ($adminValidate){
				$_SESSION['ADMIN_FLAG'] = true;
				$_SESSION['ADMIN_NAME'] = $_POST['login'];
				$this->view->location('/');
			}
			else 
				$this->view->message('Неверный логин или пароль');
		}
		$this->view->render('Вход'); 
	}

	public function addAction(){
		if (!empty($_POST)){
			$erFlag = false;
			$errors = null;
			if(empty($_POST['login'])){
				$errors.="Поле Логин не может быть пустым";
				$erFlag = true;
			}

			if(empty($_POST['email'])){
				$errors.="Поле Email не может быть пустым";
				$erFlag = true;
			}
			elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			    $errors.="Поле Email заполнено неверно";
				$erFlag = true;
			}
			if(empty($_POST['task'])){
				$errors.="Поле Текст записи не может быть пустым \n";
				$erFlag = true;
			}
			
			if($erFlag)
				$this->view->message($errors);

			$_POST['login'] = htmlspecialchars($_POST['login']);
			$_POST['email'] = htmlspecialchars($_POST['email']);
			$_POST['task'] = htmlspecialchars($_POST['task']);

			$this->model->add($_POST['login'], $_POST['email'], $_POST['task']);
			$this->view->location('/');
		}
		$this->view->render('Добавить задачу');
	}

}
?>