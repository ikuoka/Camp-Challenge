<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>12challenge</title>
</head>
<body>
   <?php
    
    $bocchan_texts = array();
    $read_line = 12;
    $bocchan_fp = fopen('4_12_bocchan.txt','r');
    
    echo '元の文章<br><br>';
    for($i=0;$i<$read_line;++$i){
        $bocchan_texts[$i]=fgets($bocchan_fp);
        echo $bocchan_texts[$i];
    }

    echo '<br><br>変更後の文章<br><br>';

    $file_txt = file_get_contents('4_12_bocchan.txt');
    $arr = explode('。', $file_txt);
    $str = implode('。<br>', $arr);
    echo $str;

    ?>
</body>
</html>