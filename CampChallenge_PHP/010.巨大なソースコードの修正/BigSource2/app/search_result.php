<?php

/* =====================================

    <変更箇所>

    ・$_GET値、空のときはnullを代入する。
    　→　Undefinedになるため

    ・検索結果画面に戻るための$_SESSION['search_name']、
    $_SESSION['search_year']、$_SESSION['search_type']を設定。
    GET値があればその値を代入し、なければnullを代入。

　 =====================================  */

session_start();
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';

// GET値、空のときはnull代入
!isset($_GET['name']) && $_GET['name'] = null;
!isset($_GET['year']) && $_GET['year'] = null;
!isset($_GET['type']) && $_GET['type'] = null;

// 検索フォームに入力された値をセッションに格納。入力されていなければnull
!empty($_GET['name']) ? $_SESSION['search_name'] = $_GET['name'] : $_SESSION['search_name'] = null;
!empty($_GET['year']) ? $_SESSION['search_year'] = $_GET['year'] : $_SESSION['search_year'] = null;
!empty($_GET['type']) ? $_SESSION['search_type'] = $_GET['type'] : $_SESSION['search_type'] = null;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        $result = null;
        //入力値がすべて空の場合
        if (empty($_GET['name']) && empty($_GET['year']) && empty($_GET['type'])) {
            $result = serch_all_profiles();
        } else {
            $result = serch_profiles($_GET['name'], $_GET['year'], $_GET['type']);
        }
        foreach ($result as $value) {
            ?>
            <tr>
                <!-- クエリストリングで表示されたデータのuserIDをupdate.phpに送る。 -->
                <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate'])); ?></td>
            </tr>
        <?php

        }
        ?>
        </table>
        <form action="<?php echo SEARCH; ?>" method="POST">
          <input type="submit" value="検索画面に戻る"style="width:100px">
        </form>
        <?php echo return_top(); ?>
</body>
</html>
