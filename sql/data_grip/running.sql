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


CREATE PROCEDURE in_log(
    IN p_date datetime,
    IN p_distance int(11),
    IN p_note varchar(255)
)
    MODIFIES SQL DATA
INSERT INTO logs (date, distance, note)
VALUES (p_date, p_distance, p_note);


CALL in_log('2022-01-12', 22, 'hello');


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


