<?php
require_once 'defined.php';
require_once 'functions.php';

Session::session_chk();

if(!isset($COOKIE['login_count']) && !isset($_COOKIE['last_login'])){
	$lcount = 1;
	$llogin = mktime();
	setcookie('login_count', $lcount);
	setcookie('last_login', $llogin);
	setcookie('SAVEDPHPSESSID', $_COOKIE['PHPSESSID']);
}else if($_COOKIE['PHPSESSID'] != $_COOKIE['SAVEDPHPSESSID']){
	setcookie('login_count', $_COOKIE['login_count']+1);
	$lcount = $_COOKIE['login_count'];
	$llogin = $_COOKIE['last_login'];
	setcookie('last_login', mktime());
	setcookie('SAVEDPHPSESSID', $_COOKIE['PHPSESSID']);
}else{
	$lcount = $_COOKIE['login_count'];
	$llogin = $_COOKIE['last_login'];
}

if(isset($_POST['logout'])){
	Session::logout_s();
	echo '<meta http-equiv="refresh" content="0;URL='.LOGIN.'">';
	exit;
}


//データ追加
$errflg = false;
$isSubmit = false;

if(isset($_POST[SUBJECT_ITEM])){
	$isSubmit = true;

	if(!empty($_POST['item_name']) && !empty($_POST['item_number']) && !empty($_POST['item_price'])){
		$item_name = $_POST['item_name'];
		$item_number = $_POST['item_number'];
		$item_price = $_POST['item_price'];

		try {
		    $pdo = DBControl::create_pdo();
		    $sql = 'INSERT '. DB_TBL_ITEMS . '(item_name, item_number, item_price) ';
			$sql .= 'VALUES (:item_name, :item_number, :item_price)';
			$reg_param = array();
			$reg_param [':item_name'] = $item_name;
			$reg_param [':item_number'] = $item_number;
			$reg_param [':item_price'] = $item_price;

		    $rowCount = DBControl::pdo_insert($pdo, $sql, $reg_param);
		    $pdo = null;
		    
		} catch (Exception $err) {
		    $pdo = null;
		    echo $err->getMessage();
		    exit;
		}

	}else{
		$errflg = true;
	}

}

//データ表示
try {
	$pdo = DBControl::create_pdo();
	$sql_select_items = 'SELECT * FROM ' . DB_TBL_ITEMS;
	$items = DBControl::pdo_select($pdo, $sql_select_items);
	$pdo = null;
	
	}catch (Exception $err) {
	$pdo = null;
	echo $err->getMessage();
	exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php echo MAIN ?></title>
</head>
<style>
	table{
		border-collapse: collapse;
	}

	th, td{
		border: 1px solid #333;
		padding: 16px;
		width: 200px;
	}
</style>
<body>
	<h1>商品登録</h1>
	<p>今回で<?php echo $lcount ?>回目のアクセスです！最終ログイン日時 <?php echo date('Y年m月d日 H時i分s秒',$llogin)?></p>
	<form action="<?php echo MAIN ?>" method="post">
		<input type="submit" name="logout" value="ログアウト">
	</form>

	<form action="<?php echo MAIN ?>" method="post">
		商品名：<input type="text" name="item_name" value=""><br>
		在庫：<input type="number" name="item_number"><br>
		価格：<input type="number" name="item_price"><br>
		<input type="submit" name="<?php echo SUBJECT_ITEM ?>">
	</form>

	<h2>商品一覧</h2>
	<?php
		if($isSubmit == true && $errflg == false){
	?>
	<p><?=MSG_REGIST_OK?></p>
	<?php

	}else{
		if($errflg == true){
			echo '<p>'.MSG_INPUT_ERR .'</p>';
		}
	}

	?>
	<table>
		<tr>
			<th>商品名</th>
			<th>在庫</th>
			<th>価格</th>
		</tr>
		<?php
		if(isset($items)){
		foreach ($items as $stmt => $row)
			for($i=0; $i<count($stmt); $i++){
			echo "<tr><td>". $row['item_name'] ."</td>";
			echo "<td>" .$row['item_number'] ."</td>";
			echo "<td>" .$row['item_price'] ."</td></tr>";
			}
		}
		 ?>
	</table>

</body>
</html>