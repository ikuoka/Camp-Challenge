<?php

	if(!empty($_POST['word'])){

	$dsn = 'mysql:host=localhost;dbname=Challenge_db;charset=utf8';
	$user = 'horita';
	$pass = 'nojimuya5A';

	try{
		$pdo_object = new PDO($dsn, $user, $pass);

		//検索処理
		$sql = "SELECT * FROM profiles WHERE name LIKE (:name) ";
		$query = $pdo_object->prepare($sql);

		if($query){
			$find_name = $_POST['word'];
			$like_name = "%". $find_name ."%";

			$query -> bindValue(':name', $like_name);
			$query -> execute();
			$result = $query->fetchall(PDO::FETCH_ASSOC);

		}else{
			echo '検索失敗';
		}

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
	<form action="8.php" method="post">
		<input type="text" name="word">
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
