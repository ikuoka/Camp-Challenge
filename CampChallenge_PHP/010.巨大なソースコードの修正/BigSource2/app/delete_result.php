<?php

/* =====================================

    <変更箇所>

    ・直リン時のエラー表示設定。

    ・「検索結果画面に戻る」ボタンの追加。

　 =====================================  */

session_start();
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';

if (!$_POST['mode'] == 'DELETE') {
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
} else {
    ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    $result = delete_profile($_POST['userID']);
    //エラーが発生しなければ表示を行う
    if (!isset($result)) {
        ?>
    <h1>削除確認</h1>
    削除しました。<br>
    <?php

    } else {
        echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
}
    echo return_top();
    ?>

    <!-- 検索結果画面に戻る。セッションを利用。 -->
    <?php
      isset($_SESSION['search_name']) ? $search_name   = '?name='.$_SESSION['search_name'] : $search_name = null;
    if (empty($search_name)) {
        isset($_SESSION['search_year']) ? $search_year = '?year='.$_SESSION['search_year'] : $search_year = null;
    } else {
        isset($_SESSION['search_year']) ? $search_year = '&year='.$_SESSION['search_year'] : $search_year = null;
    }
    if (empty($search_name) && empty($search_year)) {
        isset($_SESSION['search_type']) ? $search_type = '?type='.$_SESSION['search_type'] : $search_type = null;
    } else {
        isset($_SESSION['search_type']) ? $search_type = '&type='.$_SESSION['search_type'] : $search_type = null;
    }
    ?>
    <form action="<?php echo SEARCH_RESULT.$search_name.$search_year.$search_type; ?>" method="POST">
        <input type="submit" name="delete" value="検索結果画面に戻る"style="width:100px">
    </form>

   </body>
</body>
</html>
