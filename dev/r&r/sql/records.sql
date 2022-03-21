CREATE TABLE records (
	r_id INT NOT NULL auto_increment PRIMARY KEY,
	t_stamp DATETIME NOT NULL DEFAULT current_timestamp,
	distance_id INT NOT NULL,
	time_rec VARCHAR(50) NOT NULL,
	user_id INT NOT NULL,
	CONSTRAINT r2u FOREIGN KEY (user_id) REFERENCES users(u_id),
	CONSTRAINT r2d FOREIGN KEY (distance_id) REFERENCES distance(d_id)
);

DROP TABLE records;

CREATE TABLE distance (
	d_id INT NOT NULL auto_increment PRIMARY KEY,
	distance_name INT NOT NULL
);

DROP TABLE distance;

INSERT INTO records (distance, time_rec, user_id) VALUES (10, '01:00:00', 07);

CREATE VIEW web_records AS
	SELECT r_id ID, distance_name Distance, time_rec Time, user_name Username FROM records r
		JOIN users u ON r.user_id=u.u_id
		JOIN distance d ON r.distance_id=d.d_id;

DROP VIEW web_records;

INSERT INTO distance (distance_name) VALUES (1), (5), (10), (21), (31), (42), (62);

