<?php

//SQLに接続 初回接続時やデータ参照毎に必要
function dbConnect(): PDO
{
    try {
        //接続情報
        $dbinfo = 'mysql:host=db;dbname=appque;charset=utf8';
        $username = 'root';
        $password = 'password';

         //new PDO = PDO接続を呼び出す(PDOクラスのインスタンスを作成)
        $connectPDO = new PDO($dbinfo, $username, $password);
        $connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connectPDO;
    } catch (PDOException $e) {
        echo "DBの接続に失敗しました";
        exit();
    } finally {
        // 処理なし
    }
}

//取得したデータを、HTMLエスケープする
function escape($value)
{
    return htmlspecialchars(strval($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
