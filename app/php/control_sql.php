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

//取得した文字列型の数字をローマ数字に変換
function changeNumToRome($value)
{
    $beforeStr = array("10", "11", "12", "13", "14", "15", "16", "17","18", "19", "20", "21", "22", "23", "24", "25", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $afterStr = array("x", "xi", "xii", "xiii", "xiv", "xv", "xvi", "xvii","xviii", "xix", "xx", "xxi", "xxii", "xxiii", "xxiv", "xxv", "i", "ii", "iii", "iv", "v", "vi", "vii", "viii", "ix");

    $replaceStr = str_replace($beforeStr, $afterStr, $value);

    return $replaceStr;
}

//取得したデータを、HTMLエスケープする
function escape($value)
{
    return htmlspecialchars(strval($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
