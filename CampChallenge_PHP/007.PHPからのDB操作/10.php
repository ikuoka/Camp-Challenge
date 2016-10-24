<?php

	$dsn = 'mysql:host=localhost;dbname=Challenge_db;charset=utf8';
	$user = 'horita';
	$pass = 'nojimuya5A';

	try{
		$pdo_object = new PDO($dsn, $user, $pass);

	//追加処理
	if(!empty($_POST['profilesID'])){
		$sql = "DELETE FROM profiles WHERE profilesID = (:profilesID)";
		$query = $pdo_object->prepare($sql);
		$add_ID = $_POST['profilesID'];
		$query -> bindValue(':profilesID', $add_ID);
		$query -> execute();
	}else{
		echo '削除するIDを選択してください。';
	}

	//表示処理
		$sql = "SELECT * FROM profiles";
		$query = $pdo_object->prepare($sql);
		$query -> execute();
		$result = $query->fetchall(PDO::FETCH_ASSOC);

	}catch(PDOException $Exception){
		die('接続に失敗しました：'.$Exception->getMessage());
	}

	$pdo_object = null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>DB-kadai10</title>
</head>
<body>
	<form action="10.php" method="post">
		ID：<select name="profilesID">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			</select><br>
		<input type="submit" name="btnSubmit" value="削除">
	</form>
	<p>表示</p>
	<p>
	<?php
		//表示
		if(isset($result)){
			foreach ($result as $stmt => $row) {
				echo $row['profilesID']. '：'. $row['name']. '：'. $row['tell']. '：'. $row['age']. '：'. $row['birthday'] .'<br>'; 
			}
		}
	?>
	</p>
</body>
</html>