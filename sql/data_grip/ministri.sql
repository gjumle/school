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
    CONSTRAINT m2f FOREIGN KEY (poslanec_id) REFERENCES ministerstva (m_id)
);


