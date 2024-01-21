CREATE DATABASE IF NOT EXISTS tvs;
USE tvs;

CREATE TABLE channels (
    channel_id      INT             NOT NULL AUTO_INCREMENT,
    channel_name    VARCHAR(100)    NOT NULL,
    PRIMARY KEY (channel_id)
);

CREATE TABLE genres (
    genre_id            INT              NOT NULL AUTO_INCREMENT,
    genre_name          VARCHAR(50)      NOT NULL,
    PRIMARY KEY (genre_id)
);

CREATE TABLE programs (
    program_id          INT             NOT NULL AUTO_INCREMENT,
    channel_id          INT             NOT NULL,
    genre_id            INT             NOT NULL,
    title               VARCHAR(100)    NOT NULL,
    description         VARCHAR(300)    NOT NULL,
    PRIMARY KEY (program_id),
    FOREIGN KEY (channel_id) REFERENCES channels (channel_id) ON DELETE CASCADE,
    FOREIGN KEY (genre_id) REFERENCES genres (genre_id) ON DELETE CASCADE
);

CREATE TABLE seasons (
    season_id           INT             NOT NULL AUTO_INCREMENT,
    season_number       INT             NOT NULL,
    PRIMARY KEY (season_id)
);

CREATE TABLE episodes (
    episode_id               INT             NOT NULL AUTO_INCREMENT,
    program_id               INT             NOT NULL,
    season_id                INT             NOT NULL,
    episode_number           INT             NOT NULL,
    title                    VARCHAR(100)    NOT NULL,
    description              VARCHAR(300)    NOT NULL,
    duration_minutes         INT             NOT NULL,
    release_date             DATE            NOT NULL,
    PRIMARY KEY (episode_id),
    FOREIGN KEY (program_id) REFERENCES programs (program_id) ON DELETE CASCADE
);

CREATE TABLE time_slots (
    time_slot_id             INT             NOT NULL AUTO_INCREMENT,
    channel_id               INT             NOT NULL,
    start_time               DATETIME        NOT NULL,
    end_time                 DATETIME        NOT NULL,
    program_id               INT             NOT NULL,
    episode_id               INT             NOT NULL,
    PRIMARY KEY (time_slot_id),
    UNIQUE KEY unique_channel_time (channel_id, start_time),
    FOREIGN KEY (channel_id) REFERENCES channels (channel_id) ON DELETE CASCADE,
    FOREIGN KEY (program_id) REFERENCES programs (program_id) ON DELETE CASCADE,
    FOREIGN KEY (episode_id) REFERENCES episodes (episode_id) ON DELETE CASCADE
);

CREATE TABLE views (
    view_id                  INT             NOT NULL AUTO_INCREMENT,
    episode_id               INT             NOT NULL,
    time_slot_id             INT             NOT NULL,
    views                    INT             NOT NULL,
    PRIMARY KEY (view_id),
    FOREIGN KEY (episode_id) REFERENCES episodes (episode_id) ON DELETE CASCADE,
    FOREIGN KEY (time_slot_id) REFERENCES time_slots (time_slot_id) ON DELETE CASCADE
);

source /docker-entrypoint-initdb.d/load_channels.dump ;
source /docker-entrypoint-initdb.d/load_genres.dump ;
source /docker-entrypoint-initdb.d/load_programs.dump ;
source /docker-entrypoint-initdb.d/load_seasons.dump ;
source /docker-entrypoint-initdb.d/load_episodes.dump ;
source /docker-entrypoint-initdb.d/load_time_slots.dump ;
source /docker-entrypoint-initdb.d/load_views.dump ;
