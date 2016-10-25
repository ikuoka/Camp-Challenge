<?php

require_once 'define.php';

//DB接続
function create_pdo() {
    //データソースネームの指定
    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
    
    //PDOクラスからインスタンス化。PDOクラスのコンストラクタでDBに接続される。
    //静的プレースホルダを使うように設定
    //PHP5.2以上では、プリペアドステートメントをエミュレートする機能(動的プレースホルダ)がONになっている
    //SQLインジェクション防止のため、静的プレースホルダに変更
    //静的プレースホルダは、データベース側でバインド
    //動的プレースホルダは、バインドしてからデータベース側へ命令文を渡す
    $obj_pdo = new PDO($dsn, DB_USER, DB_PWD, array(
      PDO::ATTR_EMULATE_PREPARES => false
      ));

    //インスタンス化した$obj_pdoに、エラーが起きた時にPDOExceptionの例外を飛ばすオプションを付ける。
    //setAttribute(変更したい属性 , 値);
    //これは後付けだが、インスタンス化した時にしか設定できないものもあるので注意。
    $obj_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $obj_pdo;
}

//引数にPDOインスタンス、SQL文、バインドバリューするデータの連想配列(キーにハッシュ、値にPOST or GETされた値)
function pdo_select($obj_pdo, $sql, $params=array()) {

  //prepared statement
  $stmt = $obj_pdo->prepare($sql);  

//名前付きプレースホルダ
  foreach($params as $key=>$val) {
    $stmt->bindValue($key, $val);
  }

  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//DB追加
function pdo_insert($obj_pdo, $sql, $params=array()) {
    $stmt = $obj_pdo->prepare($sql);
    
    foreach($params as $key=>$val) {
        $stmt->bindValue($key, $val);
    }
    
    $stmt->execute();
    
    return $stmt->rowCount();
}