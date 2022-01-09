CREATE TABLE logs
(
    l_id     INT          NOT NULL AUTO_INCREMENT,
    date     DATETIME     NOT NULL,
    distance INT          NOT NULL DEFAULT 0,
    note     VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (l_id)
);


DESCRIBE logs;


INSERT INTO logs (date, distance, note)
VALUES ('2021-12-31', 6, 'beh roku');


INSERT INTO logs (date, distance, note)
VALUES ('2022-01-01 00:15:20', 12, 'novorocni beh');

CREATE PROCEDURE p_in_log(
    IN p_date datetime,
    IN p_distance int,
    IN p_note varchar
)
    MODIFIES SQL DATA
INSERT INTO logs (date, distance, note)
VALUES (p_date, p_distance, p_note);


CREATE VIEW latest as
SELECT *
FROM logs
ORDER BY date DESC;


DROP VIEW latest;


SELECT *
FROM latest;
