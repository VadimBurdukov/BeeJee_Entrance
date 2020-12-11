<?
namespace app\controllers;
use app\core\Controller;

class AdminController extends Controller{
	
	public function editAction(){
		$taskInfo = $this->model->taskInfo($this->route['id']);
		if ($taskInfo){
			$params = [
					'taskInfo' => $taskInfo[0]
				];
			if(!empty($_POST)){
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

				$this->model->editTask($this->route['id'], $_POST, $taskInfo[0]['task'], $taskInfo[0]['edited']);
				$this->view->location('/');

			}
			$this->view->render('Редаткировать запись',$params); 
		} else {
			$this->view->message('Не удаётся найти данную запись');
		}
		
		
	}

	public function deleteAction(){
		$this->model->deleteTask($this->route['id']);
		$this->view->redirect('/');
	}

	public function logoutAction() {
		unset($_SESSION['ADMIN_FLAG']);
		unset($_SESSION['ADMIN_NAME']);
		$this->view->redirect('/');
	}

}
?>