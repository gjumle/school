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

SELECT u_id FROM users WHERE user_name = 'PokeTom13';