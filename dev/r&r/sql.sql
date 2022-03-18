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

DROP TABLE records;

CREATE TABLE records (
	r_id INT NOT NULL auto_increment PRIMARY KEY,
	t_stamp DATETIME NOT NULL DEFAULT current_timestamp,
	distance INT NOT NULL,
	time_rec VARCHAR(50) NOT NULL,
	user_id INT NOT NULL,
	CONSTRAINT r2u FOREIGN KEY (user_id) REFERENCES users(u_id)
);

