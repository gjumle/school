create view v_result as
    select tr_res_id, track_name, team_name, weather_name, controller_name, username, time from track_results tr
    join track t on tr.track_id=t.tr_id
    join team tm on tr.team_id=tm.te_id
    join weather w on tr.weather_id=w_id
    join controller c on tr.controller_id=c.c_id;

drop view v_result;

create table track_results (
    tr_res_id int primary key auto_increment,
    time varchar(255),
    team_id int,
    track_id int,
    controller_id int,
    weather_id int,
    username varchar(255)
);

create table track (
    tr_id int primary key auto_increment,
    track_name varchar(255)
);

create table team (
    te_id int primary key auto_increment,
    team_name varchar(255)
);

create table weather (
    w_id int primary key auto_increment,
    weather_name varchar(255)
);

create table controller (
    c_id int primary key auto_increment,
    controller_name varchar(255)
);

insert into track_results (team_id, track_id, controller_id, weather_id, username, time) VALUES (1, 1, 1, 1, 'tomas', '10:00:12');

insert into track (track_name) VALUES ('brno');

insert into team (team_name) VALUES ('****_sila');

insert into weather (weather_name) VALUES ('kocky_a_trakare');

insert into controller (controller_name) VALUES ('mys');