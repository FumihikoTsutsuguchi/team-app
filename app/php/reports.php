<?php

function insertReports()
{
    $pdo = dbConnect();
    try {
        //トップページを読み込んだ時にその日の日報がなければ日報を作成する
        $query = <<<EOT
        INSERT IGNORE INTO
            reports (
                reported_date
            )
        VALUES (
            CURDATE()
        )
        EOT;
        $statement = $pdo->prepare($query);
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
