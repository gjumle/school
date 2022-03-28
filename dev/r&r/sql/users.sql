CREATE TABLE users (
	u_id INT not null auto_increment PRIMARY KEY,
	user_name varchar(50) NOT NULL,
	f_name VARCHAR(25) NOT NULL DEFAULT '',
	s_name VARCHAR(25) NOT NULL DEFAULT '',
	email VARCHAR(100) NOT NULL DEFAULT '@',
	age INT NOT NULL DEFAULT 0,
	CONSTRAINT u_name UNIQUE (user_name)
);

DROP TABLE users;

CREATE VIEW web_users AS
	SELECT u_id ID, user_name Username, f_name Firstname, s_name Surname, email Email, age Age FROM users;

INSERT INTO users (user_name, f_name, s_name, email, age) VALUES ('gjumle', 'Leos', 'Gjumija', 'gjumle@protonmail.com', '18');

SELECT u_id FROM users WHERE user_name = 'PokeTom13';

UPDATE users SET f_name ='Tomas', s_name ='Prerovsky', email ='tmas.ppf@gmai.com' WHERE u_id = '1';