<?php
require_once 'defined.php';

$pass = PASSWORD;

$chkpass = null;
if(empty($_POST['password'])){
	$chkpass = null;
}else{
	$chkpass = $_POST['password'];
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php echo LOGIN ?></title>
</head>
<body>
	<h1>ログイン画面</h1>
	
	<?php

	if($chkpass !== $pass){
		if($chkpass !== null){
			echo 'パスワードが異なります。もう一度ログインパスワードを入力してください<br>';
		}else{
			echo 'ログインパスワードを入力してください<br>';
		}
		?>
		<form action="<?php LOGIN ?>" method="POST">
			<input type="text" name="password">
			<input type="submit" name="btnSubmit" value="ログイン">
		</form>
	<?php
	}else{
		echo 'ログイン成功。しばらくお待ち下さい。';
		echo '<meta http-equiv="refresh" content="3;URL='.MAIN.'">';

		session_start();
		$_SESSION['last_access'] = mktime();
	}
	?>

</body>
</html>