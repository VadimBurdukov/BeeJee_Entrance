<?
namespace app\models;
use app\core\Model;

class Admin extends Model{

	public function deleteTask($id){
		$params = [
			'id' => $id
		];
		$this->db->query('DELETE FROM tasks WHERE id = :id', $params);
	}

	public function taskInfo($id){
		$params = [
			'id' => $id,
		];
		$info = $this->db->parseQueryResult('SELECT * FROM tasks WHERE id = :id', $params);
		if ($info){
			return $info;
		} else {
			return false;
		}			 
	}

	public function editTask($id, $values =[], $task, $edited){
		$done = isset($_POST['done']) ? 1 : 0;
		$edited = ($task == $values['task'] && !$edited) ? 0 : 1;
		$params = [
			'id' => $id,
			'login' => $values['login'],
			'email' => $values['email'],
			'task' => $values['task'],
			'done' => $done	
		];
		$this->db->query('UPDATE tasks SET name = :login, email = :email, task = :task, edited ='.$edited.', done = :done WHERE id = :id', $params);
	}
}
?>