<?php

	if(!empty($_POST)){

	$dsn = 'mysql:host=localhost;dbname=Challenge_db;charset=utf8';
	$user = 'horita';
	$pass = 'nojimuya5A';

	try{
		$pdo_object = new PDO($dsn, $user, $pass);

		//検索処理

			$sql = "SELECT * FROM profiles WHERE name LIKE (:name) and age LIKE (:age) and birthday LIKE (:birthday)";
			$query = $pdo_object->prepare($sql);

			$find_name = $_POST['name'];
			$like_name = "%". $find_name ."%";
			$query -> bindValue(':name', $like_name);
			$find_age = $_POST['age'];
			$like_age = "%". $find_age ."%";
			$query -> bindValue(':age', $like_age);
			$find_birth = $_POST['birthday'];
			$like_birth = "%". $find_birth ."%";
			$query -> bindValue(':birthday', $like_birth);


		$query -> execute();
		$result = $query->fetchall(PDO::FETCH_ASSOC);

	}catch(PDOException $Exception){
		die('接続に失敗しました：'.$Exception->getMessage());
	}

	$pdo_object = null;
	
	}else{
		echo '検索ワードを入力してください';
	}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>DB-kadai8</title>
</head>
<body>
	<form action="12.php" method="post">
		名前：<input type="text" name="name"><br>
		年齢：<input type="text" name="age"><br>
		誕生日：<input type="text" name="birthday"><br>
		<input type="submit" name="btnSubmit" value="検索">
	</form>
	<p>検索結果</p>
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