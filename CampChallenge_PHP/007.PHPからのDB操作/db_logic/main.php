<?php
require_once 'define.php';
require_once 'util.php';

try {
    $pdo = create_pdo();
    $sql_select_timetable = 'SELECT * FROM ' . DB_TBL;
    $timetable = pdo_select($pdo, $sql_select_timetable);
    $pdo = null;
    
} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>db_logic</title>
</head>
<body>
<style>
body{
	color: #333;
	font-family: "メイリオ";
	font-size: 16px;
}

th, td{
	border: 1px solid #555;
	padding: 20px;
	width: 120px;
	height: 80px;
}

td{
	color: green;
}

table{
	border-collapse: collapse;
}

</style>
<header>
	<h1>○×塾　時間割</h1>
	<p><a href="regi.php">時間割登録</a></p>
</header>
	<hr>
	<table>
		<tr>
			<th>月</th>
			<th>火</th>
			<th>水</th>
			<th>木</th>
			<th>金</th>
		</tr>
		
	<!-- ↓　うまくいかない -->

		<!-- <?php

		if(isset($timetable)){
		for($m=0; $m<6; $m++){
			echo "<tr>";
			for($n=0; $n<5; $n++){
				foreach($timetable as $stmt => $row){
					if($row['day'] == $n && $row['time'] == $m){
						echo "<td>" .$row['subjects']. "<br>(担当：". $row['teacher'] .")</td>";
					}else{
						echo "<td></td>";
					}
				}
			}
			echo "</tr>";
		}
		}else{
			echo "<tr><td></td><td></td><td></td><td></td><td></td></tr>" * 6;
		}

		?> -->

	<!-- ↓　もっとすっきりさせたい。ループで可能？ -->

		<tr>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 1 && $row['time'] == 1){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 2 && $row['time'] == 1){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 3 && $row['time'] == 1){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 4 && $row['time'] == 1){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 5 && $row['time'] == 1){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
		</tr>


		<tr>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 1 && $row['time'] == 2){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 2 && $row['time'] == 2){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 3 && $row['time'] == 2){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 4 && $row['time'] == 2){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 5 && $row['time'] == 2){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
		</tr>


		<tr>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 1 && $row['time'] == 3){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 2 && $row['time'] == 3){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 3 && $row['time'] == 3){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 4 && $row['time'] == 3){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 5 && $row['time'] == 3){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
		</tr>


		<tr>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 1 && $row['time'] == 4){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 2 && $row['time'] == 4){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 3 && $row['time'] == 4){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 4 && $row['time'] == 4){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 5 && $row['time'] == 4){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
		</tr>


		<tr>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 1 && $row['time'] == 5){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 2 && $row['time'] == 5){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 3 && $row['time'] == 5){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 4 && $row['time'] == 5){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 5 && $row['time'] == 5){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
		</tr>


		<tr>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 1 && $row['time'] == 6){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 2 && $row['time'] == 6){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 3 && $row['time'] == 6){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 4 && $row['time'] == 6){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
			<td>
				<?php
					if(isset($timetable)){
						foreach($timetable as $stmt => $row){
							if($row['day'] == 5 && $row['time'] == 6){
								echo $row['subjects']. "<br>(担当：". $row['teacher'] .")";
							}
						}
					}
				?>
			</td>
		</tr>
	</table>
</body>
</html>