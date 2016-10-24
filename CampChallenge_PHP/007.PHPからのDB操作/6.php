<?php

try{
	$pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'horita', 'nojimuya5A');

	//削除処理
	$sql1 = "DELETE FROM profiles WHERE name='山田太郎'";
	$query = $pdo_object->prepare($sql1);
	$query -> execute();
	//検索処理
	$sql2 = "SELECT * FROM profiles";
	$query = $pdo_object->prepare($sql2);
	$query -> execute();

	$result = $query->fetchall(PDO::FETCH_ASSOC);

	var_dump($result);

	echo '<br><br>';

	foreach ($result as $stmt => $row) {
		echo $row['profilesID']. '：'. $row['name']. '：'. $row['tell']. '：'. $row['age']. '：'. $row['birthday'] .'<br>'; 
	}

}catch(PDOException $Exception){
	die('接続に失敗しました：'.$Exception->getMessage());
}

$pdo_object = null;