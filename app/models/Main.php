<?
namespace app\models;
use app\core\Model;


class Main extends Model{
	public function getTasks(){
		$result = $this->db->getResult('SELECT * FROM tasks');
		return $result;
	}
}

?>