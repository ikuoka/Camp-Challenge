<?php
    /* =====================================

    <変更箇所>

    DB関連の定数を設定しました。

    =====================================  */

/* -------------------- パス関連 -------------------- */

const ROOT_URL          = 'http://localhost/BigSource/app/index.php';     //indexディレクトリへのURL
const TOP_URI           = '/';                                            //トップページ
const INSERT            = 'insert.php';                                   //登録ページ
const INSERT_CONFIRM    = 'insert_confirm.php';                           //登録確認ページ
const INSERT_RESULT     = 'insert_result.php';                            //登録完了ページ
const SEARCH            = 'search.php';                                   //検索ページ

/* -------------------- DB関連 -------------------- */

const DB_TYPE           = 'mysql';
const DB_HOST           = 'localhost';
const DB_DBNAME         = 'Challenge_db';
const DB_USER           = 'root';
const DB_PWD            = 'root0801';
const DB_TBL            = 'user_t';