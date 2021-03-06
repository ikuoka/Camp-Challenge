<?php
    /* =====================================

    <変更箇所>

    ・課題7,8

	DBアクセス系の処理をまとめました。

	<connect2MySQL>
	PDOのインスタンス化、オプションに「PDO::ATTR_EMULATE_PREPARES => false」、
	「PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION」を設定したものをreturnします。

	<pdo_select>
	DB検索処理。fetchAll(PDO::FETCH_ASSOC)で生成される連想配列をreturnします。

	<pdo_insert>
	DB追加処理。DB追加によって作用した行数をreturnします。

    =====================================  */


require_once 'defineUtil.php';

/* -------------------- DB接続 -------------------- */

//成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){

	//データソースネームの指定
    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
    
    //メモ
    //PDOクラスからインスタンス化。PDOクラスのコンストラクタでDBに接続される。
    //静的プレースホルダを使うように設定
    //PHP5.2以上では、プリペアドステートメントをエミュレートする機能(動的プレースホルダ)がONになっている
    //SQLインジェクション防止のため、静的プレースホルダが推奨されている。
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

/* -------------------- DB検索 -------------------- */

//引数にPDOインスタンス、SQL文、バインドバリューするデータの連想配列(キーにハッシュ、値にPOST or GETされた値)
function pdo_select($obj_pdo, $sql, $params=array()) {

	//prepared statement
	$stmt = $obj_pdo->prepare($sql);

	//名前付きプレースホルダ
	foreach($params as $key=>$val) {
	  $stmt->bindValue($key, $val);
	}

	//実行
	$stmt->execute();

	//fetchALLした結果をreturn
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/* -------------------- DB追加 -------------------- */

function pdo_insert($obj_pdo, $sql, $params=array()) {

	$stmt = $obj_pdo->prepare($sql); 
	foreach($params as $key=>$val) {
		$stmt->bindValue($key, $val);
	}
	$stmt->execute();

	//直近の SQL ステートメント(DB追加)によって作用した行数を返す
	return $stmt->rowCount();
}
