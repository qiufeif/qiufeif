<?php
class BaseModel{
	protected $db;
	public function __construct(){
		$this->db=MySQLDB::GetDB(array(
                               'host'=>'localhost',
			'port'=>'3306',
			'user'=>'root',
			'pass'=>'root',
			'charset'=>'utf8',
			'dbname'=>'itcast'
			));
	}
	public static function create($className = false){
		if ($className==false) {
			$className = get_called_class();
		}
		static $instance = array();
		if(!isset($instance[$className])){
			$instance[$className] = new $className();
		}
		return $instance[$className];
	}
}