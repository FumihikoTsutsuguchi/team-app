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
