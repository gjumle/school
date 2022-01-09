USE running;

CREATE TABLE logs
(
    l_id     INT          NOT NULL AUTO_INCREMENT,
    date     DATETIME     NOT NULL,
    distance INT          NOT NULL DEFAULT 0,
    note     VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (l_id)
);


DESCRIBE logs;


CREATE TABLE runners
(
    r_id           INT           NOT NULL AUTO_INCREMENT,
    user_name      VARCHAR(50)   NOT NULL DEFAULT '',
    total_distance INT           NOT NULL DEFAULT 0,
    e_mail         VARCHAR(2550) NOT NULL DEFAULT '@',
    PRIMARY KEY (r_id)
);


DESCRIBE runners;


CREATE TABLE l2r
(
    runner_id INT NOT NULL,
    logg_id   INT NOT NULL,
    FOREIGN KEY (runner_id) REFERENCES runners (r_id)
);


ALTER TABLE l2r
    ADD CONSTRAINT log_runner FOREIGN KEY (logg_id) REFERENCES logs (l_id);


DESCRIBE l2r;


INSERT INTO logs (date, distance, note)
VALUES ('2021-12-31', 6, 'beh roku');


INSERT INTO logs (date, distance, note)
VALUES ('2022-01-01 00:15:20', 12, 'novorocni beh');


INSERT INTO logs (date, distance, note)
VALUES ('2022-01-03 00:15:00', 10, 'vzlet');


INSERT INTO l2r (runner_id, logg_id)
VALUES (1, 1);


INSERT INTO l2r (runner_id, logg_id)
VALUES (1, 2),
       (1, 3),
       (1, 4);


CREATE PROCEDURE in_log(
    IN p_date DATE,
    IN p_distance INT(11),
    IN p_note VARCHAR(255)
)
    MODIFIES SQL DATA
INSERT INTO logs (date, distance, note)
VALUES (p_date, p_distance, p_note);


CALL in_log('2022-01-12', 22, 'hello');


CREATE PROCEDURE add_user(
    IN p_user_name VARCHAR(50),
    IN p_e_mail VARCHAR(255)
)
    MODIFIES SQL DATA
REPLACE INTO runners (user_name, e_mail)
VALUES (p_user_name, p_e_mail);


CALL add_user('petr12', 'petr21@gmail.com');


CREATE FUNCTION f_distance(
    distance INT
)
    RETURNS varchar(255)
    DETERMINISTIC NO SQL
BEGIN

    IF (distance < 15) THEN
        SET @ret = 'short';
    ELSE
        IF (distance = 42) THEN
            SET @ret = 'marathon';
        ELSE
            IF (distance > 84) THEN
                SET @ret = 'ultra-marathon';
            ELSE
                SET @ret = 'long';
            END IF;
        END IF;
    END IF;
    RETURN @ret;

END;


DROP FUNCTION f_distance;


CREATE FUNCTION f_sum_distance(
    f_user_name VARCHAR
)
    RETURNS INT(11)
    DETERMINISTIC NO SQL
BEGIN
    SET @runner = 'SELECT r_id'
                  'FROM runners'
                  'WHERE user_name = f_user_name';
    SET @retd = 'SELECT SUM(distance) Vzdálenost
                FROM logs l
                    JOIN l2r l2 ON l.l_id = l2.logg_id
                WHERE runner_id = 1';
    RETURN @retd;
END;


SELECT r_id
FROM runners
WHERE user_name = 'petr12';


SELECT SUM(distance) Vzdálenost
FROM logs l
         JOIN l2r l2 ON l.l_id = l2.logg_id
WHERE runner_id = 1;


SELECT date Datum, distance Vzdálenost, f_distance(distance) Level
FROM logs;


CREATE VIEW v_level AS
SELECT date Datum, distance Vzdálenost, f_distance(distance) Level
FROM logs;



CREATE VIEW latest AS
SELECT *
FROM logs
ORDER BY date DESC;


DROP VIEW latest;


SELECT *
FROM runners;


SELECT *
FROM l2r;


SELECT *
FROM latest;


SELECT *
FROM web_ready;


SELECT *
FROM months;


SELECT *
FROM v_level;


CREATE VIEW web_ready AS
SELECT date Datum, distance Vzdálenost
FROM logs
ORDER BY date DESC;


DROP VIEW web_ready;


CREATE VIEW months AS
SELECT CONCAT(YEAR(date), '/', MONTH(date)) Měsíc, SUM(distance) Vzdálenost
FROM logs
GROUP BY MONTH(date)
ORDER BY date DESC;


DROP VIEW months;


SHOW CREATE FUNCTION f_distance;


SHOW CREATE PROCEDURE in_log;


SHOW CREATE TABLE logs;


SHOW CREATE TABLE runners;


SHOW CREATE TABLE l2r;


SHOW CREATE VIEW web_ready;


SHOW CREATE VIEW latest;


SHOW CREATE VIEW months;


SHOW CREATE VIEW v_level;


