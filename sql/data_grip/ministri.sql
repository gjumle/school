USE
    ministri;


CREATE TABLE poslanci
(
    p_id     INT     NOT NULL AUTO_INCREMENT,
    jmeno    VARCHAR NOT NULL DEFAULT '',
    prijmeni VARCHAR NOT NULL DEFAULT '',
    PRIMARY KEY (p_id)
)


CREATE TABLE ministerstva
(
    m_id  INT     NOT NULL AUTO_INCREMENT,
    nazev VARCHAR NOT NULL DEFAULT '',
    PRIMARY KEY (m_id)
)