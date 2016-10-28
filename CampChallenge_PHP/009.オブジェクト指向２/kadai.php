<?php
require_once 'define.php';


abstract class base{
	abstract protected function load();
	abstract public function show();
}

//抽象クラス内で定義している、抽象メソッドは、必ず継承先でオーバーライドする必要があります。
//オーバーライドしていない場合エラーとなります。

class Human extends base{

	private $table = '';

	function __construct($tablename){
		$this->table = $tablename;
	}

	public function load(){

		try {
		    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
			$obj_pdo = new PDO($dsn, DB_USER, DB_PWD);
			$sql = "SELECT * FROM " .$this->table;
			$stmt = $obj_pdo->prepare($sql);
			// $stmt->bindValue(':table', $this->table);
			//バインドできない？
		    $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    return $result;
		    $pdo = null;
		    
		} catch (Exception $err) {
		    $pdo = null;
		    echo $err->getMessage();
		    exit;
		}
	}

	public function show(){

		foreach ($this->load() as $stmt => $row) {
			echo $row['name']."<br>";
		}



	}
}

class Station extends base{
	private $table = '';

	function __construct($tablename){
		$this->table = $tablename;
	}

	public function load(){

		try {
		    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
			$obj_pdo = new PDO($dsn, DB_USER, DB_PWD);
			$sql = "SELECT * FROM " .$this->table;
			$stmt = $obj_pdo->prepare($sql);
		    $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    return $result;
		    $pdo = null;
		    
		} catch (Exception $err) {
		    $pdo = null;
		    echo $err->getMessage();
		    exit;
		}
	}

	public function show(){

		foreach ($this->load() as $stmt => $row) {
			echo $row['station_name']."<br>";
		}

	}
}

$horita = new Human('Human');
var_dump($horita->load());
$horita->show();
$eki = new Station('Stations');
var_dump($eki->load());
$eki->show();