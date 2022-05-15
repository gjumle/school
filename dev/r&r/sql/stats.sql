CREATE VIEW web_stats_sum_by_user AS
    SELECT SUM(distance_name) Distance, user_name Username FROM records r
        JOIN users u ON r.user_id=u.u_id
        JOIN distance d ON r.distance_id=d.d_id
        GROUP BY Username
        ORDER BY Distance DESC;

DROP VIEW web_stats_sum_by_user;

CREATE VIEW web_stats_avg_by_user AS
    SELECT avg(distance_name) Distance, user_name Username FROM records r
        JOIN users u ON r.user_id=u.u_id
        JOIN distance d ON r.distance_id=d.d_id
        GROUP BY Username
        ORDER BY Distance DESC;

DROP VIEW web_stats_avg_by_user;

CREATE VIEW web_stats_count_by_user AS
    SELECT count(distance_name) Distance, user_name Username FROM records r
        JOIN users u ON r.user_id=u.u_id
        JOIN distance d ON r.distance_id=d.d_id
        GROUP BY Username
        ORDER BY Distance DESC;
    
DROP VIEW web_stats_count_by_user;

INSERT INTO records (distance_id, time_rec, user_id) VALUES
    ( 5, '01:10:00', 1),
    ( 4, '00:50:00', 1),
    ( 3, '00:40:00', 1),
    ( 2, '00:30:00', 1),
    ( 1, '00:20:00', 1),
    ( 5, '01:10:00', 2),
    ( 4, '00:50:00', 2),
    ( 3, '00:40:00', 2),
    ( 2, '00:30:00', 2),
    ( 1, '00:20:00', 2),
    ( 5, '01:10:00', 3),
    ( 4, '00:50:00', 3),
    ( 3, '00:40:00', 3),
    ( 2, '00:30:00', 3),
    ( 1, '00:20:00', 3),
    ( 5, '01:10:00', 4),
    ( 4, '00:50:00', 4),
    ( 3, '00:40:00', 4),
    ( 2, '00:30:00', 4),
    ( 1, '00:20:00', 4);