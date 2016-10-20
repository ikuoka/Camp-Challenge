<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>challenge1</title>
</head>
<body>
	<form action="./kadai1-2.php" method="post">
		名前：<input type="text" name="name"><br>
		性別：
		<input type="radio" name="sex" value="男">男
		<input type="radio" name="sex" value="女">女<br>
		趣味：<textarea name="hobby" rows="4" cols="40" placeholder="テキストを入力してください"></textarea>
		<input type="submit">
	</form>

	<?php 

	$name = isset($_POST['name']) ? $_POST['name'] : "";
	$sex = isset($_POST['sex']) ? $_POST['sex'] : "";
	$hobby = isset($_POST['hobby']) ? $_POST['hobby'] : "";

	echo '<br>';
	echo '名前：' .$name. '<br>';
	echo '性別：' .$sex. '<br>';
	echo '趣味：' .$hobby. '<br>';

	?>
</body>
</html>