<?php

/* =====================================

    <変更箇所>

    ・クエリストリングで表示されたデータのuserIDを、
    update.php、delete.phpに送る。

    ・直リン時のエラー表示設定。

    ・「検索結果画面に戻る」ボタンの追加。
    セッションに格納された値でクエリストリングを設定。

　 =====================================  */

session_start();
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';

if (!$_GET['id']) {
    echo '検索結果がうまく表示されません。もう一度トップページからやり直してください<br>';
} else {
    ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報詳細画面</title>
</head>
  <body>
    <?php
    $result = profile_detail($_GET['id']);
    //エラーが発生しなければ表示を行う
    if (is_array($result)) {
        ?>

    <h1>詳細情報</h1>
    名前:<?php echo $result[0]['name']; ?><br>
    生年月日:<?php echo $result[0]['birthday']; ?><br>
    種別:<?php echo ex_typenum($result[0]['type']); ?><br>
    電話番号:<?php echo $result[0]['tell']; ?><br>
    自己紹介:<?php echo $result[0]['comment']; ?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>

    <form action="<?php echo UPDATE; ?>?id=<?php echo $_GET['id']; ?>" method="POST">
        <input type="submit" name="update" value="変更"style="width:100px">
    </form>
    <form action="<?php echo DELETE; ?>?id=<?php echo $_GET['id']; ?>" method="POST">
        <input type="submit" name="delete" value="削除"style="width:100px">
    </form>

    <!-- 検索結果画面に戻る。セッションを利用。 -->
    <?php
      isset($_SESSION['search_name']) ? $search_name       = '?name='.$_SESSION['search_name'] : $search_name = null;
        if (empty($search_name)) {
            isset($_SESSION['search_year']) ? $search_year = '?year='.$_SESSION['search_year'] : $search_year = null;
        } else {
            isset($_SESSION['search_year']) ? $search_year = '&year='.$_SESSION['search_year'] : $search_year = null;
        }
        if (empty($search_name) && empty($search_year)) {
            isset($_SESSION['search_type']) ? $search_type = '?type='.$_SESSION['search_type'] : $search_type = null;
        } else {
            isset($_SESSION['search_type']) ? $search_type = '&type='.$_SESSION['search_type'] : $search_type = null;
        } ?>
    <form action="<?php echo SEARCH_RESULT.$search_name.$search_year.$search_type; ?>" method="POST">
        <input type="submit" name="delete" value="検索結果画面に戻る"style="width:100px">
    </form>

    <?php

    } else {
        echo 'データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
}
    echo return_top();
    ?>
  </body>
</html>
