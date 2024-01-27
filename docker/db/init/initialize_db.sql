DROP DATABASE IF EXISTS appque;
CREATE DATABASE appque;
USE appque;
-- 全てのアバター情報を保存するテーブル
CREATE TABLE avatars (
    avatar_id        SMALLINT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    avatar_name      VARCHAR(20)          NOT NULL,
    file_name        VARCHAR(50)          NOT NULL,
    discription      VARCHAR(50)          NOT NULL,
    enabble_level    SMALLINT UNSIGNED    NOT NULL,
    enable_status    BOOLEAN              NOT NULL    DEFAULT FALSE,
    PRIMARY KEY (avatar_id)
);


-- プレイヤーが達することのできるレベルと、必要な経験値の関係を保存するテーブル
CREATE TABLE player_levels (
    player_level     SMALLINT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    require_exp      SMALLINT UNSIGNED    NOT NULL,
    PRIMARY KEY (player_level)
);

-- プレイヤーの現在の情報を保存するテーブル
CREATE TABLE players (
    player_id            SMALLINT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    current_level        SMALLINT UNSIGNED    NOT NULL    DEFAULT 1,
    current_exp          SMALLINT UNSIGNED    NOT NULL    DEFAULT 0,
    current_avatar_id    SMALLINT UNSIGNED    NOT NULL    DEFAULT 0,
    PRIMARY KEY (player_id),
    FOREIGN KEY (current_level) REFERENCES player_levels (player_level) ON DELETE CASCADE,
    FOREIGN KEY (current_avatar_id) REFERENCES avatars (avatar_id) ON DELETE CASCADE
);

-- 教材、クエストがどの分野に属するかを判断するためのカテゴリを保存するテーブル
CREATE TABLE teq_categorys (
    category_id      SMALLINT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    category_name    VARCHAR(20)          NOT NULL    UNIQUE,
    PRIMARY KEY (category_id)
);

-- QUESTの内容がskilldocかquestかを判断するためのカテゴリを保存するテーブル
CREATE TABLE quest_categorys (
    category_id      SMALLINT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    category_name    VARCHAR(10)          NOT NULL    UNIQUE,
    PRIMARY KEY (category_id)
);

-- 教材を保存するテーブル
CREATE TABLE lerning_references (
    reference_id       SMALLINT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    reference_title    VARCHAR(50)          NOT NULL    UNIQUE,
    teq_category_id    SMALLINT UNSIGNED    NOT NULL,
    author_name        VARCHAR(20)          NOT NULL    DEFAULT '',
    discription        VARCHAR(200)         NOT NULL    DEFAULT '',
    PRIMARY KEY (reference_id),
    FOREIGN KEY (teq_category_id) REFERENCES teq_categorys (category_id) ON DELETE CASCADE
);

-- 全てのQUESTを保存するテーブル
CREATE TABLE quests (
    quest_id             SMALLINT UNSIGNED    NOT NULL    AUTO_INCREMENT,
    quest_no             SMALLINT UNSIGNED    NOT NULL,
    quest_title          VARCHAR(50)          NOT NULL,
    teq_category_id      SMALLINT UNSIGNED    NOT NULL,
    quest_category_id    SMALLINT UNSIGNED    NOT NULL,
    if_advanced          BOOLEAN              NOT NULL    DEFAULT FALSE,
    discription          VARCHAR(5000)         NOT NULL    DEFAULT '',
    PRIMARY KEY (quest_id),
    FOREIGN KEY (teq_category_id) REFERENCES teq_categorys (category_id) ON DELETE CASCADE,
    FOREIGN KEY (quest_category_id) REFERENCES quest_categorys (category_id) ON DELETE CASCADE
);

-- 学習記録を保存するテーブル
CREATE TABLE records (
    started_at      DATETIME             NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    finished_at     DATETIME             NOT NULL    DEFAULT CURRENT_TIMESTAMP    UNIQUE,
    quest_id        SMALLINT UNSIGNED    NOT NULL    DEFAULT 1,
    reference_id    SMALLINT UNSIGNED    NOT NULL    DEFAULT 1,
    PRIMARY KEY (started_at),
    FOREIGN KEY (quest_id) REFERENCES quests (quest_id) ON DELETE CASCADE,
    FOREIGN KEY (reference_id) REFERENCES lerning_references (reference_id) ON DELETE CASCADE
);

-- 日報を保存するテーブル
CREATE TABLE reports (
    reported_date       DATE             NOT NULL,
    what_learned        VARCHAR(200)     NOT NULL    DEFAULT '',
    introspection       VARCHAR(1000)    NOT NULL    DEFAULT '',
    learning_per_day    TIME             NOT NULL    DEFAULT '00:00:00',
    PRIMARY KEY (reported_date)
);

-- ユーザー作成
CREATE USER IF NOT EXISTS devuser@localhost IDENTIFIED BY 'ppp';

GRANT ALL ON *.* to devuser@localhost;

-- 初期データ読み込み
 source /docker-entrypoint-initdb.d/load_avatars.dump;
 source /docker-entrypoint-initdb.d/load_player_levels.dump ;
 source /docker-entrypoint-initdb.d/load_players.dump ;
 source /docker-entrypoint-initdb.d/load_quest_categorys.dump ;
 source /docker-entrypoint-initdb.d/load_teq_categorys.dump ;
 source /docker-entrypoint-initdb.d/load_lerning_references.dump ;
 source /docker-entrypoint-initdb.d/load_quests.dump ;
 source /docker-entrypoint-initdb.d/load_sample_records.dump ;
 source /docker-entrypoint-initdb.d/load_sample_reports.dump ;
