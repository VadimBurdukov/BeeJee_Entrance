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
				if(gettype($value)==='integer'){
					$stmt->bindValue(':'.$key, $value, PDO::PARAM_INT);
				} else {
					
					$stmt->bindValue(':'.$key, $value);
				}
				
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function parseQueryResult($query, $params = []){
	 	$result = $this->query($query, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($query, $params = []) {
		$result = $this->query($query, $params);
		return $result->fetchColumn()[0];
	}	
}
?>