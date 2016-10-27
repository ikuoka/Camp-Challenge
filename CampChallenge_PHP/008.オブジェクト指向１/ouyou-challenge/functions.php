<?php

require_once 'defined.php';


//セッション関数
class Session{

static function session_chk(){
	$period_time = 120;
	session_start();
	$elapsed_time = mktime() - $_SESSION['last_access'];
	if(!empty($_SESSION['last_access'])){
		if($elapsed_time > $period_time){
			echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
			logout_s();
			exit;
		}else{
			$_SESSION['last_access'] = mktime();
		}
	}else{
		echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
		exit;
	}
}

/**
 * セッション情報を破棄するための関数
 */
static function logout_s(){
    session_unset();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
}

}


//DB操作クラス
class DBControl{

//PDO作成
static function create_pdo() {
    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
    $obj_pdo = new PDO($dsn, DB_USER, DB_PWD, 
    	array(
    		//静的プレースホルダに設定
      		PDO::ATTR_EMULATE_PREPARES => false
      	));
    $obj_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $obj_pdo;
}

//DB検索
static function pdo_select($obj_pdo, $sql, $params=array()) {
  $stmt = $obj_pdo->prepare($sql);
  foreach($params as $key=>$val) {
    $stmt->bindValue($key, $val);
  }

  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//DB追加
static function pdo_insert($obj_pdo, $sql, $params=array()) {
    $stmt = $obj_pdo->prepare($sql);
    foreach($params as $key=>$val) {
        $stmt->bindValue($key, $val);
    }
    
    $stmt->execute();
    
    return $stmt->rowCount();
}

}
