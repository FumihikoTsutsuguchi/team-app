<?php

//メインページのプレイヤー情報取得
function getPlayersInfo()
{
    $pdo = dbConnect();

        //トランザクション開始
        $pdo->beginTransaction();

    try {
        //プレイヤーレベル、経験値、設定アバターid、アバター名、レベルアップに必要な経験値取得
        $query = <<<EOT
        SELECT
            ply.*,
            ava.avatar_name,
            ava.file_name,
            lev.require_exp
        FROM
            players AS ply
            INNER JOIN avatars AS ava
            ON ply.current_avatar_id = ava.avatar_id
            INNER JOIN player_levels AS lev
            ON ply.current_level = lev.player_level
        EOT;
        $statement = $pdo->prepare($query);
        $statement->execute();

        //戻り値に格納
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $playerLevel = $result['current_level'];
        $playerExp = $result['current_exp'];
        $nextLevel = $result['require_exp'];
        $requireExp = $nextLevel - $playerExp;
        $avatar_name = $result['avatar_name'];
        $fileName = escape($result['file_name']);
        $avatar_path = "./img/avatar/" . $fileName;

        //トランザクションをコミット
        $pdo->commit();
        return array($playerLevel, $playerExp, $avatar_path, $avatar_name, $requireExp);
    } catch (PDOException $e) {
            $pdo->rollback();
            echo "取得失敗";
        return;
    } finally {
            // 処理なし
    }
}

function getCurrentAvatarId()
{
    $pdo = dbConnect();

    try {
        //設定アバターid取得
        $query = 'SELECT current_avatar_id FROM players';
        $statement = $pdo->prepare($query);
        $statement->execute();
        $current_avatar_id = $statement->fetch(PDO::FETCH_ASSOC);

        return $current_avatar_id['current_avatar_id'];
    } catch (PDOException $e) {
        echo "取得失敗";
        return false;
    } finally {
            // 処理なし
    }
}

function playerLevelUp($addExp, $pdo)
{
    //db接続はしない(引数から取得)

    try {
        //レベルと現在の経験値を加算して更新
        $query = 'UPDATE players SET current_level = current_level + 1, current_exp = :getExp WHERE player_id = 1';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':getExp', $addExp, PDO::PARAM_INT);
        $statement->execute();
    } catch (PDOException $e) {
        echo "更新失敗";
    } finally {
            // 処理なし
    }
}

function addPlayerCurrentExp($addExp, $pdo)
{
    //db接続はしない(引数から取得)

    try {
        //取得経験値を加算
        $query = 'UPDATE players SET current_exp = current_exp + :getExp WHERE player_id = 1';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':getExp', $addExp, PDO::PARAM_INT);
        $statement->execute();
    } catch (PDOException $e) {
        echo "更新失敗";
    } finally {
            // 処理なし
    }
}
