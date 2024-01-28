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
//
function selectReports($date)
{
    $pdo = dbConnect();

    try {
        $query = <<<EOT
        SELECT
            *
        FROM
            reports
        WHERE
            reported_date = :date
        EOT;
        $statement = $pdo->prepare($query);
        $statement->bindValue(':date', $date, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
// 戻り値例：array ( 'reported_date' => '2024-01-28',
//                  'what_learned' => 'ＤＢ paiza',
//                  'introspection' => 'がんばりました！',
//                  'learning_per_day' => '12:00:00',
//                )
        return $result;
    } catch (PDOException $e) {
        echo "取得失敗";
        return false;
    } finally {
        // 処理なし
    }
}

function setTotalPlaytime()
{
    $pdo = dbConnect();

    try {
        $query = <<<EOT
            SELECT
                SEC_TO_TIME(SUM(time_to_sec(TIMEDIFF(finished_at, started_at)))) AS learning_time
            FROM
                records
            WHERE
                DATE_FORMAT(started_at, '%Y-%m-%d') = CURDATE()
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();
        $todaysLearningTime = $statement->fetch(PDO::FETCH_ASSOC);

        var_dump($todaysLearningTime);

        $query = <<<EOT
        UPDATE
          reports
        SET
            learning_per_day = :todaysLearningTime
        WHERE
           reported_date = CURDATE()
        EOT;
        $statement = $pdo->prepare($query);
        $statement->bindValue(':todaysLearningTime', $todaysLearningTime['learning_time'], PDO::PARAM_STR);
        $statement->execute();


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
