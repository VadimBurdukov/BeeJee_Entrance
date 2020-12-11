<?
namespace app\models;
use app\core\Model;


class Main extends Model{

	public function getTasks($route, $taskPerPage, $sortParams){
		$params = [
			'limit' => $taskPerPage,
			'offset' => $taskPerPage*(($route['page'] ?? 1)-1),
		];
		$result = $this->db->parseQueryResult('SELECT * 
											   FROM tasks
											   ORDER BY '.$sortParams['SORT_BY'].' '.$sortParams['SORT_DIRECTION'].'
											   LIMIT :limit 
											   OFFSET :offset',
											   $params
											 );
		return $result;
	}

	public function getPageCount(){
 		return $this->db->column('SELECT COUNT(id) FROM tasks');
	}

	public function add($name,$email,$task){
		$params = [
			'name' => $name,
			'email' => $email,
			'task' => $task,
		];
		
		$this->db->query('INSERT INTO tasks (name,email,task) 
						  VALUES (:name, :email, :task)',
						  $params
						);
	}

	public function adminValidate($name, $pwd){
		$params = [
			'name' => $name,
			'pwd' => (int)$pwd,
		];
		//debug($params);
		$result = $this->db->column('SELECT * 
									 FROM admins 
									 WHERE name = :name AND
									       password = :pwd',
									 $params
									);
		if ($result)
			return true;
		return false;
	}
}
?>