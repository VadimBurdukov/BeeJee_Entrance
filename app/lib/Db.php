<?

namespace app\lib;
use PDO;

class Db{

	protected $db;

	public function __construct(){
		$conf = require 'app/config/Db.php';
		$this->db = new PDO('mysql:host='.$conf['HOST'].';
								dbname='.$conf['DB'],
								$conf['USER'], 
								$conf['PWD']
					   );
	}

	public function query($query, $params = [])	{
		$stmt = $this->db->prepare($query);
		
		if (!empty($params)){
			foreach ($params as $key => $value) {
				$stmt->bindValue(':'.$key, $value);
			}
		}

		$stmt->execute();
		return $stmt;
	}

	public function getResult($query, $params = []){
		$res = $this->query($query, $params);
		return $res->FetchAll(PDO::FETCH_ASSOC);
	}
}
?>