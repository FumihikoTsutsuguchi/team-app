<?php

//メインページのプレイヤー情報取得
function getPlayersInfo()
{
    $pdo = dbConnect();

        //トランザクション開始
        $pdo->beginTransaction();

    try {
        //プレイヤーレベル、経験値、設定アバターid取得
        $query = 'SELECT current_level, current_exp,current_avatar_id FROM players';
        $statement = $pdo->prepare($query);
        $statement->execute();

        //戻り値に格納
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $playerLevel = $result['current_level'];
        $playerExp = $result['current_exp'];
        $avatar_id = $result['current_avatar_id'];

        //アバター画像パス取得
        $query = 'SELECT file_name FROM avatars WHERE avatar_id = :avatar_id';
        $statement2 = $pdo->prepare($query);
        $statement2->bindValue(':avatar_id', $avatar_id, PDO::PARAM_STR);
        $statement2->execute();

        //戻り値に格納
        $result2 = $statement2->fetch(PDO::FETCH_ASSOC);
        $fileName = escape($result2['file_name']);
        $avatar = "./img/avatar/" . $fileName;

        //トランザクションをコミット
        $pdo->commit();
        return array($playerLevel, $playerExp, $avatar);
    } catch (PDOException $e) {
            $pdo->rollback();
            echo "取得失敗";
        return;
    } finally {
            // 処理なし
    }
}
