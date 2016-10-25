<?php

require_once 'define.php';
require_once 'util.php';

$errflg = false;
$isSubmit = false;

if(isset($_POST[SUBJECT_TIMETABLE])){
	$isSubmit = true;

	if(!empty($_POST['day']) && !empty($_POST['time']) && !empty($_POST['subjects']) && !empty($_POST['teacher'])){
		$day = $_POST['day'];
		$time = $_POST['time'];
		$subjects = $_POST['subjects'];
		$teacher = $_POST['teacher'];

		try {
		    //DB接続
		    $pdo = create_pdo();

		    //DB全検索(重複チェックに使う)
		    $sql_select_timetable = 'SELECT * FROM ' . DB_TBL;
		    $timetable = pdo_select($pdo, $sql_select_timetable);

		    //インサート文
		    $sql = 'INSERT '. DB_TBL . '(day, time, subjects, teacher) ';
			$sql .= 'VALUES (:day, :time, :subjects, :teacher)';

			//ハッシュの設定
			$reg_param = array();
			$reg_param [':day'] = $day;
			$reg_param [':time'] = $time;
			$reg_param [':subjects'] = $subjects;
			$reg_param [':teacher'] = $teacher;

			//重複チェック処理
		    foreach($timetable as $stmt => $row){
		    	if($row['day'] == $day && $row['time'] == $time){
		    		echo '指定の時間はすでに登録されています。<br>' ;
		    		echo '<a href="regi.php">戻る<a>';
		    		$pdo = null;
		    		exit;
		    	}
		    }

		    $timetable = pdo_insert($pdo, $sql, $reg_param);
		    $pdo = null;
		    
		} catch (Exception $err) {
		    $pdo = null;
		    echo $err->getMessage();
		    exit;
		}

	}else{
		$errflg = true;
	}

}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>時間割登録</title>
</head>
<body>
<style>
body{
	font-family: "メイリオ";
	font-size: 16px;
}

</style>
	<h1>○×塾　時間割登録</h1>
	<a href="main.php">トップに戻る</a>
	<?php
		if($isSubmit == true && $errflg == false){
	?>
	<p><?=MSG_REGIST_OK?></p>
	<?php

	}else{
		if($errflg == true){
			echo '<p>'.MSG_INPUT_ERR .'</p>';
		}
	}

	?>
	<hr>
	<form action="regi.php" method="post">
		曜日：<select name="day">
			<option value="1">月</option>
			<option value="2">火</option>
			<option value="3">水</option>
			<option value="4">木</option>
			<option value="5">金</option>
		</select>
		<br>
		時限：<select name="time">
			<option value="1">1時限目</option>
			<option value="2">2時限目</option>
			<option value="3">3時限目</option>
			<option value="4">4時限目</option>
			<option value="5">5時限目</option>
			<option value="6">6時限目</option>
		</select>
		<br>
		科目：<input type="text" name="subjects" value="<?php if ($isSubmit == true && !empty($_POST['subjects'])) { echo $_POST['subjects']; } ?>">
		<br>
		担当：<input type="text" name="teacher" value="<?php if ($isSubmit == true && !empty($_POST['teacher'])) { echo $_POST['teacher']; } ?>">
		<input type="submit" name="<?=SUBJECT_TIMETABLE?>" value="登録">
	</form>
</body>
</html>