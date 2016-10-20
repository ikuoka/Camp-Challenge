<?php

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>kadai6</title>
</head>
<body>
	<?php
	// var_dump($_FILES);
	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploadedtest.txt');
	
	//アップロードされたファイル(txt)を開く
	$fp = fopen('uploadedtest.txt', 'r');

	//ファイルの行数を調べ、$countに格納
	$count = count(file('uploadedtest.txt'));

	//表示
	echo '表示結果<br><br>';

	for($i=0;$i<$count;++$i){
        $texts[$i]=fgets($fp);
        echo $texts[$i];
    }

	fclose($fp);
	?>
</body>
</html>