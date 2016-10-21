<?php

session_start();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>challenge1</title>
</head>
<body>
	<form action="./kadai7-1.php" method="post">
		名前：<input type="text" name="name" value="<?php echo $_SESSION['name'] ?>">
		<br>
		性別：
		<input type="radio" name="sex" value="男" checked="<?php echo $_SESSION['sex'] ?>">男
		<input type="radio" name="sex" value="女" checked="<?php echo $_SESSION['sex'] ?>">女<br>
		趣味：<textarea name="hobby" rows="4" cols="40" placeholder="<?echo $_SESSION['hobby'] ?>"></textarea>
		<input type="submit">
	</form>
</body>
</html>