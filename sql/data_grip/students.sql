SHOW DATABASES;

CREATE DATABASE students;

DROP TABLE students;

CREATE TABLE students
(
    s_id     INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name     VARCHAR(255) NOT NULL DEFAULT '',
    sur_name VARCHAR(255) NOT NULL DEFAULT '',
    class_id INT          NOT NULL,
    CONSTRAINT s2c FOREIGN KEY (class_id) REFERENCES class (c_id)
);

CREATE TABLE class
(
    c_id INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL DEFAULT ''
);


INSERT INTO class (name)
VALUES ('1.B'),
       ('2.B'),
       ('3.B'),
       ('4.B');


SELECT * FROM students;