CREATE DATABASE users;


USE users;


CREATE TABLE user
(
    u_id  INT          NOT NULL AUTO_INCREMENT,
    jmeno VARCHAR(255) NOT NULL DEFAULT '',
    age   INT          NOT NULL DEFAULT 0,
    PRIMARY KEY (u_id)
);


CREATE TABLE stat
(
    user_id    INT          NOT NULL DEFAULT 0,
    row_id     INT          NOT NULL DEFAULT 0,
    stat_jmeno VARCHAR(255) NOT NULL DEFAULT '',
    avg_age    INT          NOT NULL DEFAULT 0,
    PRIMARY KEY (row_id),
    FOREIGN KEY (user_id) REFERENCES user (u_id)
);


DESCRIBE user;


DESCRIBE stat;


ALTER TABLE stat
    ADD CONSTRAINT f_stat_jmeno FOREIGN KEY (stat_jmeno) REFERENCES user (jmeno);


ALTER TABLE stat
    MODIFY COLUMN row_id INT NOT NULL AUTO_INCREMENT;


DROP TABLE stat;


SELECT *
FROM stat;


SELECT *
FROM user;


INSERT INTO user (jmeno, age)
VALUES ('Petr', 15),
       ('Lucie', 17),
       ('Adam', 19);


CREATE PROCEDURE p_vek(
    IN p_jmeno VARCHAR(255),
    IN p_age INT
)
    MODIFIES SQL DATA
BEGIN
    REPLACE INTO stat(stat_jmeno, avg_age)
    VALUES (p_jmeno, p_age);
    UPDATE stat SET avg_age = (SELECT AVG(age) FROM user WHERE jmeno = p_jmeno) WHERE stat_jmeno = p_jmeno;
END;


DROP PROCEDURE p_vek;


CREATE TRIGGER t_af_in
    AFTER INSERT
    ON user
    FOR EACH ROW
BEGIN
    CALL p_vek(NEW.stat_jmeno, NEW.avg_age);
END;

DROP TRIGGER t_af_in;


CALL p_vek('Petr', 15);