<?php

session_start();
if(isset($_POST['name'])){
$_SESSION['name'] = $_POST['name'];
}
if(isset($_POST['sex'])){
$_SESSION['sex'] = $_POST['sex'];
}
if(isset($_POST['hobby'])){
$_SESSION['hobby'] = $_POST['hobby'];
}

//　↑　疑問：kadai7-1と重複してよいのかどうか

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>challenge1</title>
</head>
<body>
	<form action="./kadai7-1.php" method="post">
		名前：<input type="text" name="name" value="<?= $_SESSION['name'] ?>">
		<br>
		性別：
		<input type="radio" name="sex" value="男" checked="<?= $_SESSION['sex'] ?>">男
		<input type="radio" name="sex" value="女">女<br>
		趣味：<textarea name="hobby" rows="4" cols="40" placeholder="<?= $_SESSION['hobby'] ?>"></textarea>
		<input type="submit">
	</form>
</body>
</html>