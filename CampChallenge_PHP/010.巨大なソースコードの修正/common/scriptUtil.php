<?php
require_once '../common/defineUtil.php';


  function return_top(){
      return "<a href='".ROOT_URL."'>トップへ戻る</a>";
  }


/* -------------------- データ保持(year/month/day) -------------------- */

//重複が多いのでもう少しすっきりさせられる？

//年
  function yearRetent(){
	if(!empty($_POST['year']) && $_POST['year'] != '---'){

    for($m=1950; $m<=2010; $m++){
        if($m == $_POST['year']){
            echo "<option value=". $m ." selected>" .$m. "</option>";
        }else{
            echo "<option value=". $m .">" .$m. "</option>";
        }
    }

    }else{
        for($n=1950; $n<=2010; $n++){
            echo "<option value=". $n .">" .$n. "</option>";
        }
    }
  }


//月
  function monthRetent(){
	if(!empty($_POST['month']) && $_POST['month'] != '--'){

    for($x=1; $x<=12; $x++){
        if($x == $_POST['month']){
            echo "<option value=". $x ." selected>" .$x. "</option>";
        }else{
            echo "<option value=". $x .">" .$x. "</option>";
        }
    }

    }else{
        for($y=1; $y<=12; $y++){
            echo "<option value=". $y .">" .$y. "</option>";
        }
    }
  }


//日
  function dayRetent(){
	if(!empty($_POST['day']) && $_POST['day'] != '--'){

    for($z=1; $z<=31; $z++){
        if($z == $_POST['day']){
            echo "<option value=". $z ." selected>" .$z. "</option>";
        }else{
            echo "<option value=". $z .">" .$z. "</option>";
        }
    }

    }else{
        for($w=1; $w<=31; $w++){
            echo "<option value=". $w .">" .$w. "</option>";
        }
    }
  }


/* -------------------- データ保持(radio) -------------------- */

  function selected_radio(){
    if(!empty($_POST['type'])){
    	$type = $_POST['type'];
        $type == 'エンジニア'
        ? print '<input type="radio" name="type" value="エンジニア" checked>エンジニア<br>'
        : print '<input type="radio" name="type" value="エンジニア">エンジニア<br>';
        $type == '営業'
        ? print '<input type="radio" name="type" value="営業" checked>営業<br>'
        : print '<input type="radio" name="type" value="営業">営業<br>';
        $type == 'その他'
        ? print '<input type="radio" name="type" value="その他" checked>その他<br>'
        : print '<input type="radio" name="type" value="その他">その他<br>';
        }else{
        print '<input type="radio" name="type" value="エンジニア" checked>エンジニア<br>';
        print '<input type="radio" name="type" value="営業">営業<br>';
        print '<input type="radio" name="type" value="その他">その他<br>';
        }
	}

