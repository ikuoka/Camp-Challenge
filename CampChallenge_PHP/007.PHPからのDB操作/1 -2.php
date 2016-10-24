<?php

try{
	$pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'horita', 'nojimuya5A');
	$sql = "INSERT INTO profiles(name, age) VALUES(:name, :age)";
	$query = $pdo_object->prepare($sql);

	$query -> bindValue(':name', '山田太郎');
	$query -> bindValue(':age', 76);

	$query -> execute();

}catch(PDOException $Exception){
	die('接続に失敗しました：'.$Exception->getMessage());
}

$pdo_object = null;