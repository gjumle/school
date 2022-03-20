CREATE TABLE records (
	r_id INT NOT NULL auto_increment PRIMARY KEY,
	t_stamp DATETIME NOT NULL DEFAULT current_timestamp,
	distance INT NOT NULL,
	time_rec VARCHAR(50) NOT NULL,
	user_id INT NOT NULL,
	CONSTRAINT r2u FOREIGN KEY (user_id) REFERENCES users(u_id)
);

DROP TABLE records;

INSERT INTO records (distance, time_rec, user_id) VALUES (10, '01:00:00', 07);

CREATE VIEW web_records AS
	SELECT r_id ID, distance Distance, time_rec Time, user_name Username FROM records r JOIN users u ON r.user_id=u.u_id;