<?php

try{
	$pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'horita', 'nojimuya5A');

	//更新処理
	$sql1 = "UPDATE profiles set name='松岡 修造', age=48, birthday='1967-11-06' WHERE profilesID=1";
	$query = $pdo_object->prepare($sql1);
	$query -> execute();
	//検索処理
	$sql2 = "SELECT * FROM profiles";
	$query = $pdo_object->prepare($sql2);
	$query -> execute();
	$result = $query->fetchall(PDO::FETCH_ASSOC);

	//表示
	var_dump($result);
	echo '<br><br>';
	foreach ($result as $stmt => $row) {
		echo $row['profilesID']. '：'. $row['name']. '：'. $row['tell']. '：'. $row['age']. '：'. $row['birthday'] .'<br>'; 
	}

}catch(PDOException $Exception){
	die('接続に失敗しました：'.$Exception->getMessage());
}

$pdo_object = null;