DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
	`id`			INT(11) AUTO_INCREMENT,
    `author_name` 	VARCHAR(128),
    `date_posted` 	DATETIME,
    `message`		TEXT,
    `status` 		CHAR(1) DEFAULT "A",
    `edited`		DATETIME,
    PRIMARY KEY(`id`)
);