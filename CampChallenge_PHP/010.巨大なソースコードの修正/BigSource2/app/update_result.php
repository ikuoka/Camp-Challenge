<?php

/* =====================================

    <変更箇所>

    ・タイムゾーン設定。

    ・scriptUtil.phpより、null_chk()を用いて、
    POST値の存在チェックをし、連想配列に格納。


　 =====================================  */

require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';

if(!$_POST['mode']=="RESULT"){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php

    //ポストの存在チェックしつつ、連想配列にポストされた値を格納
    $confirm_values = array(
                            'name' => null_chk('name'),
                            'year' => null_chk('year'),
                            'month' => null_chk('month'),
                            'day' => null_chk('day'),
                            'type' => null_chk('type'),
                            'tell' => null_chk('tell'),
                            'comment' => null_chk('comment'), );

    if (!in_array(null, $confirm_values, true)) {
        $result = update_profile($_POST['userID'], $_POST['name'], $_POST['year'],
        $_POST['month'], $_POST['day'], $_POST['tell'], $_POST['type'], $_POST['comment']);
      //エラーが発生しなければ表示を行う
      if (!isset($result)) {
          ?>

      <h1>更新確認</h1>
      <p>以上の内容で更新しました。</p>

      <?php

      foreach ($confirm_values as $key => $value) {
          if ($key == 'name') {
              echo '名前 : '.$value.'<br>';
          }
          if ($key == 'year') {
              echo '生年月日 : '.$value.'年';
          }
          if ($key == 'month') {
              echo $value.'月';
          }
          if ($key == 'day') {
              echo $value.'日<br>';
          }
          if ($key == 'type') {
              echo '種別 : '.ex_typenum($value).'<br>';
          }
          if ($key == 'tell') {
              echo '電話番号 : '.$value.'<br>';
          }
          if ($key == 'comment') {
              echo '自己紹介 : '.$value.'<br>';
          }
      }
      } else {
          echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
      }
    } else {
        foreach ($confirm_values as $key => $value) {
            if ($value == null) {
                if ($key == 'name') {
                    echo '名前';
                }
                if ($key == 'year') {
                    echo '年';
                }
                if ($key == 'month') {
                    echo '月';
                }
                if ($key == 'day') {
                    echo '日';
                }
                if ($key == 'type') {
                    echo '種別';
                }
                if ($key == 'tell') {
                    echo '電話番号';
                }
                if ($key == 'comment') {
                    echo '自己紹介';
                }
                echo 'が未記入です<br>';
            }
        } ?>

  <?php
      }
    }
    ?>
    <form action="<?php echo RESULT_DETAIL; ?>?id=<?php echo $_POST['userID']; ?>" method="POST">
      <input type="submit" name="update" value="詳細画面に戻る"style="width:100px">
    </form>
  <?php
    echo return_top();
  ?>

  </body>
</html>
