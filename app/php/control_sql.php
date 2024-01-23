<?php

//SQLに接続 初回接続時やデータ参照毎に必要
function dbConnect()
{
    try {
        //接続情報
        $dbinfo = 'mysql:host=localhost;dbname=<データベース名>;charset=utf8';
        $username = 'root';
        $password = 'password';

         //new PDO = PDO接続を呼び出す(PDOクラスのインスタンスを作成)
        $connectPDO = new PDO($dbinfo, $username, $password);

        return $connectPDO;
    } catch (PDOException $e) {
        echo "DBの接続に失敗しました";
    } finally {
        // 処理なし
    }
}

//データ挿入
function insertData($type, $post)
{
    $pdo = dbConnect();

    //学習記録

    //学習教材

    //日報
}

//データ取得
function selectData($type, $get)
{
    $pdo = dbConnect();

    //クエスト

    //学習記録

    //学習教材

    //日報

    //アバター情報
}

//データ更新
function renewData($type, $post)
{
    $pdo = dbConnect();

    //アバター情報

    //学習記録

    //日報
}

//データ削除
function deleteData($type, $post)
{
    $pdo = dbConnect();

    //学習記録

    //学習教材

    //日報
}
