<?php

function insertRecords()
{
    $pdo = dbConnect();

    try {
        /**
        * クエリ内容一例 :
        * INSERT INTO records(started_at, finished_at, quest_id, reference_id)
        *        VALUES(:started_at, CURRENT_TIMESTAMP, :quest_id, :reference_id);
        */
        $query = file_get_contents('insert.sql');
        $statement = $pdo->prepare($query);
        //date : 2000-07-01T00:00:00+00:00
        $statement->bindValue(':started_at', date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000)), PDO::PARAM_STR);
        $statement->bindValue(':quest_id', 1, PDO::PARAM_INT);
        $statement->bindValue(':reference_id', 1, PDO::PARAM_INT);
        $statement->execute();

        return true;
    } catch (PDOException $e) {
        echo "登録失敗";
        return false;
    } finally {
        // 処理なし
    }
}

function selectRecords()
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

function renewRecords()
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

function deleteRecords()
{
    $pdo = dbConnect();

    try {
        $query = file_get_contents('delete.sql');
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

function getPlaytime()
{
    $pdo = dbConnect();

    //トランザクション開始
    $pdo->beginTransaction();
    try {
        //直近一週間分の勉強時間を取得
        $query = <<<EOT
        SELECT
            DATE_FORMAT(started_at, '%Y-%m-%d') AS date,
            TIME_FORMAT(SUM(TIMEDIFF(finished_at, started_at)), '%H:%i:%s') AS learning_time
        FROM
            records
        GROUP BY
            DATE_FORMAT(started_at, '%Y-%m-%d')
        ORDER BY
            DATE_FORMAT(started_at, '%Y-%m-%d') DESC
        LIMIT 7
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $learningTimes = date('G時間i分', strtotime($results[0]['learning_time']));

        //直近１週間の合計勉強時間を表示
        $query = <<<EOT
        SELECT
            TIME_FORMAT(SUM(TIMEDIFF(finished_at, started_at)), '%H:%i:%s') AS learning_time
        FROM
            records
        WHERE
            started_at BETWEEN  (CURDATE() - INTERVAL 7 DAY) AND (CURDATE() + INTERVAL 1 DAY)
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $weeklyLearningTime = date('G時間i分', strtotime($result['learning_time']));

        //全学習時間を取得
        $query = <<<EOT
        SELECT
            TIME_FORMAT(SUM(TIMEDIFF(finished_at, started_at)), '%H:%i:%s') AS learning_time
        FROM
            records
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $totalLearningTime = date('G時間i分', strtotime($result['learning_time']));

        //トランザクションをコミット
        $pdo->commit();
        return array($learningTimes, $weeklyLearningTime, $totalLearningTime);
    } catch (PDOException $e) {
            $pdo->rollback();
            echo "取得失敗";
        return;
    } finally {
            // 処理なし
    }
}
