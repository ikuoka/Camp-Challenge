<?php
    /* =====================================

    <変更箇所>

    課題1,2,3

    ・「トップに戻る」リンクを実装しました。

    ・生年月日の「--」「---」に対するフィルター処理を実装しました。

    ・どの項目が未入力なのかエラー表示する処理を実装しました。

    =====================================  */

    session_start();
    require_once '../common/defineUtil.php'; 
    require_once '../common/scriptUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php

    if(!empty($_POST['name']) && !empty($_POST['type']) 
        && !empty($_POST['tell']) && !empty($_POST['comment'])

    // ----------- 課題2 -----------
        && $_POST['year'] != '---' && $_POST['month'] != '--' && $_POST['day'] != '--' ){

        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;

    ?>
    <style type="text/css">
      .alert{
        color: red;
      }
    </style>
    
        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
            <input type="hidden" name="name"    value="<?php !empty($_POST['name'])    && print $_POST['name'] ?>">
            <input type="hidden" name="year"    value="<?php !empty($_POST['year'])    && print $_POST['year'] ?>">
            <input type="hidden" name="month"   value="<?php !empty($_POST['month'])   && print $_POST['month'] ?>">
            <input type="hidden" name="day"     value="<?php !empty($_POST['day'])     && print $_POST['day'] ?>">
            <input type="hidden" name="type"    value="<?php !empty($_POST['type'])    && print $_POST['type'] ?>">
            <input type="hidden" name="tell"    value="<?php !empty($_POST['tell'])    && print $_POST['tell'] ?>">
            <input type="hidden" name="comment" value="<?php !empty($_POST['comment']) && print $_POST['comment'] ?>">
            <input type="submit" name="yes"     value="はい">
        </form>

        <form action="<?php echo INSERT ?>" method="POST">
            <input type="hidden" name="name"    value="<?php !empty($_POST['name'])    && print $_POST['name'] ?>">
            <input type="hidden" name="year"    value="<?php !empty($_POST['year'])    && print $_POST['year'] ?>">
            <input type="hidden" name="month"   value="<?php !empty($_POST['month'])   && print $_POST['month'] ?>">
            <input type="hidden" name="day"     value="<?php !empty($_POST['day'])     && print $_POST['day'] ?>">
            <input type="hidden" name="type"    value="<?php !empty($_POST['type'])    && print $_POST['type'] ?>">
            <input type="hidden" name="tell"    value="<?php !empty($_POST['tell'])    && print $_POST['tell'] ?>">
            <input type="hidden" name="comment" value="<?php !empty($_POST['comment']) && print $_POST['comment'] ?>">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        
    <?php }else{?>
        <h1>入力項目が不完全です</h1>
        <p style="color: red;">
        <?php

        // ----------- 課題3 -----------
          $_POST['year'] == '----'  && print "・「年」が未入力です。<br>";
          $_POST['month'] == '--'   && print  "・「月」が未入力です。<br>";
          $_POST['day']   == '--'   && print  "・「日」が未入力です。<br>";
          empty($_POST['name'])     && print '・名前が未入力です<br>';
          empty($_POST['type'])     && print '・職業が未入力です<br>';
          empty($_POST['tell'])     && print '・電話番号が未入力です<br>';
          empty($_POST['comment'])  && print '・自己紹介文が未入力です<br>';

        ?>
        </p>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="hidden" name="name"    value="<?php !empty($_POST['name'])    && print $_POST['name'] ?>">
            <input type="hidden" name="year"    value="<?php !empty($_POST['year'])    && print $_POST['year'] ?>">
            <input type="hidden" name="month"   value="<?php !empty($_POST['month'])   && print $_POST['month'] ?>">
            <input type="hidden" name="day"     value="<?php !empty($_POST['day'])     && print $_POST['day'] ?>">
            <input type="hidden" name="type"    value="<?php !empty($_POST['type'])    && print $_POST['type'] ?>">
            <input type="hidden" name="tell"    value="<?php !empty($_POST['tell'])    && print $_POST['tell'] ?>">
            <input type="hidden" name="comment" value="<?php !empty($_POST['comment']) && print $_POST['comment'] ?>">
            <input type="submit" name="no"      value="登録画面に戻る">
        </form>

    <?php }?>

    <!-- ######################### 課題1 ######################### -->
    <?php echo return_top(); ?>
</body>
</html>
