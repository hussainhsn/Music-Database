LOAD DATA LOCAL INFILE "artist.csv"
INTO TABLE artist
FIELDS TERMINATED BY ",";

LOAD DATA LOCAL INFILE "genre.csv"
INTO TABLE genre
FIELDS TERMINATED BY ",";

LOAD DATA LOCAL INFILE "song.csv"
INTO TABLE song
FIELDS TERMINATED BY ",";

LOAD DATA LOCAL INFILE "album.csv"
INTO TABLE album
FIELDS TERMINATED BY ",";

LOAD DATA LOCAL INFILE "A_names.csv"
INTO TABLE A_names
FIELDS TERMINATED BY ",";