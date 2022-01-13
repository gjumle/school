USE
    ministri;


CREATE TABLE poslanci
(
    p_id     INT         NOT NULL AUTO_INCREMENT,
    jmeno    VARCHAR(25) NOT NULL DEFAULT '',
    prijmeni VARCHAR(25) NOT NULL DEFAULT '',
    PRIMARY KEY (p_id)
);


CREATE TABLE ministerstva
(
    m_id  INT         NOT NULL AUTO_INCREMENT,
    nazev VARCHAR(25) NOT NULL DEFAULT '',
    PRIMARY KEY (m_id)
);


CREATE TABLE funkcni_obdobi
(
    poslanec_id INT  NOT NULL DEFAULT 0,
    ministr_id  INT  NOT NULL DEFAULT 0,
    od          DATE NOT NULL DEFAULT '0000-00-00',
    do          DATE NOT NULL DEFAULT '0000-00-00',
    CONSTRAINT p2f FOREIGN KEY (poslanec_id) REFERENCES poslanci (p_id),
    CONSTRAINT m2f FOREIGN KEY (ministr_id) REFERENCES ministerstva (m_id)
);


REPLACE INTO poslanci (jmeno, prijmeni)
VALUES ('Petr', 'Fiala'),
       ('Vít', 'Rakušan'),
       ('Marian', 'Jurečka'),
       ('Ivan', 'Bartoš'),
       ('Jan', 'Hamáček');

REPLACE INTO ministerstva (nazev)
VALUES ('Vnitra'),
       ('Práce a soc. věcí'),
       ('Místní rozvoj'),
       ('Zdravotnictví');

REPLACE INTO funkcni_obdobi (poslanec_id, ministr_id, od)
VALUES (2, 1, '2021-12-17'),
       (3, 2, '2021-12-17'),
       (4, 3, '2021-12-17'),
       (3, 4, '2021-12-17');


CREATE VIEW v_volni_poslanci AS
SELECT DISTINCT CONCAT(jmeno, ' ', prijmeni) Poslanec
FROM poslanci
WHERE poslanci.p_id NOT IN (SELECT poslanec_id FROM funkcni_obdobi)
ORDER BY Poslanec ASC;

SELECT *
FROM v_volni_poslanci;


CREATE VIEW v_ministri AS
SELECT CONCAT(jmeno, ' ', prijmeni) Poslanec, nazev Ministerstvo, od Od
FROM poslanci
         JOIN funkcni_obdobi fo on poslanci.p_id = fo.poslanec_id
         JOIN ministerstva m on fo.ministr_id = m.m_id
WHERE do IS NULL
ORDER BY Poslanec ASC;

SELECT *
FROM v_ministri;


CREATE VIEW v_multi_ministri AS
SELECT CONCAT(jmeno, ' ', prijmeni) Poslanec, nazev Ministerstvo
FROM poslanci
         JOIN funkcni_obdobi fo on poslanci.p_id = fo.poslanec_id
         JOIN ministerstva m on m.m_id = fo.ministr_id
WHERE (SELECT COUNT(poslanec_id) FROM funkcni_obdobi WHERE p_id = funkcni_obdobi.poslanec_id) > 1
ORDER BY Poslanec ASC;

SELECT *
FROM v_multi_ministri;


CREATE FUNCTION f_pocet_ministerstev(
    f_jmeno VARCHAR(25),
    f_prijmeni VARCHAR(25)
)
    RETURNS INT(25)
    DETERMINISTIC
BEGIN
    SELECT COUNT(ministr_id)
    INTO @ret
    FROM poslanci
             JOIN funkcni_obdobi f on poslanci.p_id = f.poslanec_id
             JOIN ministerstva m on m.m_id = f.ministr_id
    WHERE prijmeni = f_prijmeni;
    IF (@ret IS NULL) THEN
        RETURN 0;
    END IF;
    RETURN @ret;
END;

DROP FUNCTION f_pocet_ministerstev;

SELECT CONCAT(jmeno, '' '', prijmeni) Poslanec, f_pocet_ministerstev('Ivan', 'Bartoš') Funkce
FROM funkcni_obdobi
         JOIN poslanci p on p.p_id = funkcni_obdobi.poslanec_id;
