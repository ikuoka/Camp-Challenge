<?php
    /* =====================================

    <変更箇所>

    課題1,5,6,8

    ・「トップに戻る」リンクを実装しました。

    ・直接リンクアクセスのエラー処理を実装しました。
    「insert_confirm.php」のsubmitボタン(name='yes')の有無で分岐させています。

    ・タイムゾーンをアジア圏に設定し、date()で現在時刻を正しい型に変換しています。

    ・DB接続・追加では、dbaccessUtil.phpのconnect2MySQL()、pdo_insert()を使用。

    ・例外処理の追加。DB接続時に「PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION」を設定しているので、
    PDOはエラーコードを設定することに加え、PDOException をスローします。
    
    =====================================  */

    session_start();
    require_once '../common/scriptUtil.php';
    require_once '../common/dbaccesUtil.php';
    require_once '../common/scriptUtil.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

<?php

// ----------- 課題5 直リン防止 -----------
if (empty($_POST['yes'])){

    echo "不正なアクセスです。トップページに戻って入力してください。<br>";
    echo return_top();

}else{

    $name           = $_SESSION['name'];
    $birthday       = $_SESSION['birthday'];
    $type           = $_SESSION['type'];
    $tell           = $_SESSION['tell'];
    $comment        = $_SESSION['comment'];

    // ----------- 課題6 現在時刻を正しい型にして変数に格納 -----------
    date_default_timezone_set('Asia/Tokyo');
    $currentTime    = date("Y-m-d H:i:s", time());

    //DB接続
    try {

        //PDO生成
        $pdo    = connect2MySQL();

        //SQL文
        $sql    = 'INSERT '. DB_TBL . '(name, birthday, type, tell, comment, newDate) ';
        $sql   .= 'VALUES(:name, :birthday, :type, :tell, :comment, :newDate)';

        //foreachでbindValueさせる連想配列の指定
        $param              = array();
        $param['name']      = $name;
        $param['birthday']  = $birthday;
        $param['type']      = $type;
        $param['tell']      = $tell;
        $param['comment']   = $comment;
        $param['newDate']   = $currentTime;

        //SQL実行
        $user               = pdo_insert($pdo, $sql, $param);
        $pdo                = null;

    } catch(Exception $err){

        // ----------- 課題8 例外処理 -----------
        $pdo = null;
        echo '<p>データの挿入に失敗しました : ' .$err->getMessage(). '</p>';
        echo return_top();
        exit;
    }

?>

    <h1>登録結果画面</h1><br>
    名前:<?php echo $name;?><br>
    生年月日:<?php echo $birthday;?><br>
    種別:<?php echo $type?><br>
    電話番号:<?php echo $tell;?><br>
    自己紹介:<?php echo $comment;?><br>
    以上の内容で登録しました。<br>

    <?php echo return_top(); }?>

</body>
</html>
