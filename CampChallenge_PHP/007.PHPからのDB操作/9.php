<?php

	$dsn = 'mysql:host=localhost;dbname=Challenge_db;charset=utf8';
	$user = 'horita';
	$pass = 'nojimuya5A';

	try{
		$pdo_object = new PDO($dsn, $user, $pass);

	//追加処理
	if(!empty($_POST['name']) && !empty($_POST['tell']) && !empty($_POST['age']) && !empty($_POST['birthday'])){
		$sql = "INSERT INTO profiles(profilesID, name, tell, age, birthday) VALUES(:profilesID, :name, :tell, :age, :birthday)";
		$query = $pdo_object->prepare($sql);
		$add_ID = $_POST['profilesID'];
		$add_name = $_POST['name'];
		$add_tell = $_POST['tell'];
		$add_age = $_POST['age'];
		$add_birthday = $_POST['birthday'];
		$query -> bindValue(':profilesID', $add_ID);
		$query -> bindValue(':name', $add_name);
		$query -> bindValue(':tell', $add_tell);
		$query -> bindValue(':age', $add_age);
		$query -> bindValue(':birthday', $add_birthday);
		$query -> execute();
	}else{
		echo 'すべての値に入力してください。';
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
	<title>DB-kadai9</title>
</head>
<body>
	<form action="9.php" method="post">
		ID：<select name="profilesID">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			</select><br>
		名前：<input type="text" name="name"><br>
		電話番号：<input type="text" name="tell"><br>
		年齢：<input type="text" name="age"><br>
		誕生日：<input type="text" name="birthday"><br>
		<input type="submit" name="btnSubmit" value="入力">
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