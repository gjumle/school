USE studet;


CREATE TABLE student (
    s_id INT NOT NULL AUTO_INCREMENT,
    jmeno VARCHAR NOT NULL DEFAULT '',
    prijmeni VARCHAR NOT NULL DEFAULT '',
    PRIMARY KEY (s_id)
);


CREATE TABLE znamky (
    z_id INT NOT NULL AUTO_INCREMENT,
    hodnoceni INT NOT NULL DEFAULT 0,
    PRIMARY KEY (z_id)
);

CREATE TABLE predmet (
    p_id INT NOT NULL AUTO_INCREMENT,
    nazev VARCHAR NOT NULL DEFAULT '',
    PRIMARY KEY (p_id)
);


CREATE TABLE prubezne_hodnoceni (
    ph_id INT NOT NULL AUTO_INCREMENT,
    student_id INT NOT NULL DEFAULT 0,
    predmet_id INT NOT NULL DEFAULT 0,
    znamka_id INT NOT NULL DEFAULT 0,
    datum DATE NOT NULL DEFAULT NOW(),
    PRIMARY KEY (ph_id),
    CONSTRAINT ph2s FOREIGN KEY (student_id) REFERENCES student(s_id),
    CONSTRAINT ph2p FOREIGN KEY (predmet_id) REFERENCES predmet(p_id),
    CONSTRAINT ph2z FOREIGN KEY (znamka_id) REFERENCES znamky(z_id)
);