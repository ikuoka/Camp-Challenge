<?php

/* =====================================

    <変更箇所>

    ・フォームにユーザーの詳細データが最初から表示されるように設定。
    ・typeがhiddenのinputでデータのuserIDをPOSTで更新先に送る。
    ・「詳細画面に戻る」追加。
    ・直リン時のエラー表示設定。

　 =====================================  */

require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';

if(!$_POST['update']){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
    <form action="<?php echo UPDATE_RESULT ?>" method="POST">
    <?php
    $result = profile_detail($_GET['id']);
    ?>
    名前:
    <input type="text" name="name" value="<?php echo $result[0]['name']; ?>">
    <br><br>

    生年月日:　
    <select name="year">
        <option value="">----</option>
        <?php
        for ($i = 1950; $i <= 2010; ++$i) {
            ?>
        <option value="<?php echo $i; ?>" <?php mb_substr($result[0]['birthday'], 0, 4) == $i && print 'selected'; ?>>
          <?php echo $i; ?>
        </option>
        <?php

        } ?>
    </select>年
    <select name="month">
        <option value="">--</option>
        <?php
        for ($i = 1; $i <= 12; ++$i) {
            ?>
        <option value="<?php echo $i; ?>" <?php mb_substr($result[0]['birthday'], 5, 2) == $i && print 'selected'; ?>>
          <?php echo $i; ?></option>
        <?php

        } ?>
    </select>月
    <select name="day">
        <option value="">--</option>
        <?php
        for ($i = 1; $i <= 31; ++$i) {
            ?>
        <option value="<?php echo $i; ?>" <?php mb_substr($result[0]['birthday'], 8, 2) == $i && print 'selected'; ?>>
          <?php echo $i; ?></option>
        <?php

        } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for ($i = 1; $i <= 3; ++$i) {
        ?>
    <input type="radio" name="type" value="<?php echo $i; ?>" <?php $i == $result[0]['type'] && print 'checked'; ?>>
    <?php echo ex_typenum($i); ?><br>
    <?php

    } ?>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $result[0]['tell']; ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $result[0]['comment']; ?></textarea><br><br>

    <input type="hidden" name="mode"  value="RESULT">
    <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    <input type="hidden" name="userID" value="<?php echo $result[0]['userID']; ?>">

    </form>

    <form action="<?php echo RESULT_DETAIL; ?>?id=<?php echo $result[0]['userID']; ?>" method="POST">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    </form>
    <?php
    }
     echo return_top();
     ?>
</body>

</html>
