CREATE TABLE book (
    k_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL,
    genre_id INT NOT NULL,
    CONSTRAINT g2k FOREIGN KEY (genre_id) REFERENCES genre(g_id)
);

CREATE TABLE genre (
    g_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL
);

INSERT INTO genre (name) VALUES ('sci-fi'), ('drama');