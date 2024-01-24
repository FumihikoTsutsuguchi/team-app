<?php

function insertReports()
{
    $pdo = dbConnect();

    try {
        $query = 'file_get_contents() ~.sqlパスで指定';
        $statement = $pdo->prepare($query);
        // $statement->bindValue(***); クエリ内に条件がある場合は必要
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "取得失敗";
        return false;
    }
}

function selectReports()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('selsct.sql');
        $statement = $pdo->prepare($query);
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "取得失敗";
        return false;
    } finally {
        // 処理なし
    }
}

function renewReports()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('selsct.sql');
        $statement = $pdo->prepare($query);
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "更新失敗";
        return false;
    } finally {
        // 処理なし
    }
}

function deleteReports()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('selsct.sql');
        $statement = $pdo->prepare($query);
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "削除失敗";
        return false;
    } finally {
        // 処理なし
    }
}
