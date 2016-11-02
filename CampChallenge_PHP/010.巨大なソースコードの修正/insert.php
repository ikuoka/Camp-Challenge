<?php
    /* =====================================

    <変更箇所>

    課題1,4

    ・「トップに戻る」リンクを実装しました。

    ・フォームの値が保持されるような処理を実装しました。
    <select>と<radio>に関する処理は「scriptUtil.php」に記述してあります。

    =====================================  */

    require_once '../common/defineUtil.php'; 
    require_once '../common/scriptUtil.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">

        名前:
        <!-- ######################### 課題4 ######################### -->
        <input type="text" name="name" value="<?php !empty($_POST['name']) && print $_POST['name'] ?>">
        <br><br>
        
        生年月日:
        <!-- ######################### 課題4 ######################### -->

        <select name="year">
            <option value="----">----</option>
            <!-- scriptUtil.phpより -->
            <?php yearRetent(); ?>
        </select>年
        <select name="month">
            <option value="--">--</option>
            <!-- scriptUtil.phpより -->
            <?php monthRetent(); ?>
        </select>月
        <select name="day">
            <option value="--">--</option>
            <!-- scriptUtil.phpより -->
            <?php dayRetent(); ?>
        </select>日
        <br><br>

        種別:
        <!-- ######################### 課題4 ######################### -->
        <br>
        <!-- scriptUtil.phpより -->
            <?php selected_radio() ?>
        <br>
        
        電話番号:
        <!-- ######################### 課題4 ######################### -->
        <input type="text" name="tell" value="<?php isset($_POST['tell']) && print $_POST['tell'] ?>">
        <br><br>

        自己紹介文
        <!-- ######################### 課題4 ######################### -->
        <br>
        <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php !empty($_POST['comment']) && print $_POST['comment'] ?></textarea><br><br>
        
        <input type="submit" name="btnSubmit" value="確認画面へ">

    </form>

    <!-- ######################### 課題1 ######################### -->
    <?php echo return_top(); ?>

</body>
</html>
