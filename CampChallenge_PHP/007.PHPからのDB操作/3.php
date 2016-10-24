<?php

try{
	$pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'horita', 'nojimuya5A');
	$sql = "SELECT * FROM profiles";
	$query = $pdo_object->prepare($sql);

	$query -> execute();
	$result = $query->fetchall(PDO::FETCH_ASSOC);

	var_dump($result);

	echo '<br><br>';

	//検索結果の連想配列は$stmt => $rowで取得。データは$row['カラム名']

	foreach ($result as $stmt => $row) {
		echo $row['profilesID']. '：'. $row['name']. '：'. $row['tell']. '：'. $row['age']. '：'. $row['birthday'] .'<br>'; 
	}

	//　↓　はうまくいかなかった。

	// foreach ($result as $num => $arr) {
	// 	for($x=0; $x<3; $x++){
	// 		$profile = $arr[$x];
	// 		foreach ($profile as $key => $value) {
	// 			for($y=0; $y<5; $y++){
	// 				echo $key[$y]. 'は'. $value[$y]. '<br>';
	// 			}
	// 		}
	// 	}
	// }

}catch(PDOException $Exception){
	die('接続に失敗しました：'.$Exception->getMessage());
}

$pdo_object = null;