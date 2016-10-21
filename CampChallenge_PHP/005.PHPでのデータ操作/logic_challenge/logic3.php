<?php
require_once 'logic4.php';
require_once 'logic6.php';

session_chk();

	$get_data = array();

    if(!empty($_GET['name'])){
        $get_data['name'] = $_GET['name'];
    }
    if(!empty($_GET['text'])){
        $get_data['text'] = $_GET['text'];
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php SHOW ?></title>
</head>
<body>
	<h1>投稿結果</h1>
	<?php
	if(!isset($get_data['name']) || !isset($get_data['text'])){
		echo '<p style="color:red; font-weight:bold;">名前とテキストはどちらも入力してください！</p>';
		echo '<meta http-equiv="refresh" content="1;URL='.INPUT.'">';
	}else{
		echo "名前：". $get_data['name'] ."<br>";
		echo "内容：". $get_data['text'] ."<br><br>";
	}
	?>
</body>
</html>