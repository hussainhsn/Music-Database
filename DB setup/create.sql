drop table if exists artist;
drop table if exists genre;
drop table if exists song;
drop table if exists album;
drop table if exists A_names;

create table artist(
  artist_id varchar(22) primary key,
  artist_country varchar(20)
);

create table genre(
  genre_id int primary key,
  genre_name varchar(20)
);

create table album(
  album_id varchar(22) primary key,
  album_name varchar(55),
  s_id varchar(22)
);

create table song(
  song_id varchar(22) primary key,
  song_name varchar(100),
  date_added date,
  ge_id int,
  al_id varchar(22),
  ar_id varchar(22),
  FOREIGN KEY (ge_id) REFERENCES genre(genre_id)
  on delete set null,
  FOREIGN KEY (al_id) REFERENCES album(album_id)
  on delete set null,
  FOREIGN KEY (ar_id) REFERENCES artist(artist_id)
  on delete set null
);

create table A_names(
  artist_names varchar(50) primary key,
  a_id varchar(22),
  FOREIGN KEY (a_id) REFERENCES artist(artist_id)
  on delete set null
);