<?php

function selectAvatars()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('select.sql');
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

function renewAvatars()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('renew.sql');
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
