CREATE DATABASE Vanoce;


USE Vanoce;


CREATE TABLE Tree
(
    t_id INT          NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (t_id)
);


CREATE TABLE Sklad
(
    s_id     INT NOT NULL AUTO_INCREMENT,
    strom_id INT NOT NULL DEFAULT 0,
    pocet    INT NOT NULL DEFAULT 0,
    PRIMARY KEY (s_id),
    FOREIGN KEY (strom_id) REFERENCES Tree (t_id)
);


ALTER TABLE Sklad
    ADD COLUMN vyska INT NOT NULL DEFAULT 0;


ALTER TABLE Sklad
    ADD CONSTRAINT FOREIGN KEY (vyska) REFERENCES Vyska (v_id);


ALTER TABLE Sklad
    ADD COLUMN cena INT NOT NULL DEFAULT 0;


ALTER TABLE Sklad
    DROP COLUMN cena;


CREATE TABLE Vyska
(
    v_id  INT NOT NULL AUTO_INCREMENT,
    vyska INT NOT NULL DEFAULT 0,
    PRIMARY KEY (v_id)
);


DESCRIBE Vyska;

DESCRIBE Tree;

DESCRIBE Sklad;


INSERT INTO Tree (name)
VALUES ('Borovice'),
       ('Jedle'),
       ('Smrk');


INSERT INTO Vyska (vyska)
VALUES (200),
       (150),
       (120),
       (90);


INSERT INTO Sklad (strom_id, pocet, vyska, cena)
VALUES (1, 1, 1, 180);


INSERT INTO Sklad (strom_id, pocet, vyska)
VALUES (1, 2, 1),
       (2, 3, 4);


SELECT *
FROM Vyska;


SELECT *
FROM Tree;


SELECT *
FROM Sklad;


SELECT name Strom, Vyska.vyska, pocet
FROM Sklad
         JOIN Tree T ON (Sklad.strom_id = T.t_id)
         JOIN Vyska V ON (Sklad.vyska = V.v_id);


SELECT Vyska.vyska
FROM Vyska
         JOIN Sklad S ON (S.vyska = Vyska.v_id)
WHERE v_id = 1;


SELECT name
FROM Tree
         JOIN Sklad S on Tree.t_id = S.strom_id
WHERE Tree.t_id = 2;


CREATE FUNCTION f_cena(
    strom_typ VARCHAR(255),
    vyska_strom INT(11)
)
    RETURNS VARCHAR(255)
    DETERMINISTIC NO SQL
BEGIN
    SET @typ = 'SELECT name FROM Tree JOIN Sklad S on Tree.t_id = S.strom_id WHERE name = strom_typ';
    SET @vvyska = 'SELECT Vyska.vyska FROM Vyska JOIN Sklad S ON (S.vyska = Vyska.v_id) WHERE v_id = vyska_strom;';
    SET @ret = 300;
    IF (@vyska > 120) THEN
        SET @ret = @ret + 100;
    ELSE
        IF (@vyska > 150) THEN
            SET @ret = @ret + 200;
        ELSE
            IF (@vyska > 170) THEN
                SET @ret = @ret + 500;
            END IF;
        END IF;
    END IF;

    IF (@typ = 1) THEN
        SET @ret = @ret - 100;
    ELSE
        IF (@typ = 2) THEN
            SET @ret = @ret + 200;
        ELSE
            IF (@typ = 3) THEN
                SET @ret = @ret + 100;
            END IF;
        END IF;
    END IF;

    RETURN @ret;

END;


DROP FUNCTION f_cena;


SELECT strom_id AS Typ_stromu, vyska AS Vyska, f_cena('Borovice', 135) AS Cena
FROM Sklad
         JOIN Tree T on T.t_id = Sklad.strom_id;


CREATE TABLE IF NOT EXISTS s_backup LIKE Sklad;


CREATE TRIGGER t_backup
    BEFORE DELETE
    ON Sklad
    FOR EACH ROW
BEGIN
    INSERT INTO s_backup SELECT *;
END;


SELECT * FROM s_backup;


DELETE FROM Sklad WHERE vyska = 4;
