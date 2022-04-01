<html>
     <head>
     <title>Results</title>
     </head>
     <body style="background-color:AliceBlue;">
<?php
$search = $_POST['search'];
$category = $_POST['category'];
$servername = "localhost";
$username = "halmatta";
$password = "64gWpEHg";
$db = "halmatta_1";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($category == "song") {
    $sql = "select * from artist,song,album,genre,A_names
        where song_name like '%$search%' 
        and ar_id = artist_id 
        and al_id = album_id 
        and ge_id = genre_id
        and a_id = ar_id
        order by song_name, date_added desc";
    $result = $conn->query($sql);
    $k = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //date_added
            $date_added = $row["date_added"];
            //song_name
            $song_name = $row["song_name"];
            //artist_country
            $artist_country = $row["artist_country"];
            //artist_names
            $artist_names = $row["artist_names"];
            //album_name
            $album_name = $row["album_name"];
            //genre_name
            $genre_name = $row["genre_name"];
            if ($k != 0) {
                echo "<br>";
                echo "<br>";
            }
            $k = 1;
            echo "Song: " . $song_name . " - Date added: " . $date_added . "<br>";
            echo "Album: " . $album_name . " - Genre: " . $genre_name . "<br>";
            echo "Artist: " . $artist_names . " from " . $artist_country . "<br>";
        }
    } else {
        echo "0 results for '$search'";
    }
} else if ($category == "album") {
    $sql = "select * from artist,song,album,genre,A_names
        where album_name like '%$search%' 
        and ar_id = artist_id 
        and al_id = album_id 
        and ge_id = genre_id
        and a_id = ar_id
        order by album_name, date_added desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $j = 0;
        while ($row = $result->fetch_assoc()) {
            //date_added
            $date_added = $row["date_added"];
            //song_name
            $song_name = $row["song_name"];
            //artist_country
            $artist_country = $row["artist_country"];
            //artist_names
            $artist_names = $row["artist_names"];
            //album_name
            $album_name = $row["album_name"];
            //genre_name
            $genre_name = $row["genre_name"];
            if ($cached_name != $album_name) {
                if ($j != 0) {
                    echo "<br>";
                }
                $j = 1;
                echo "Album: " . $album_name . " - Genre: " . $genre_name . "<br>";
                echo "Date added: " . $date_added . "<br>";
                echo "Artist: " . $artist_names . " from " . $artist_country . "<br>";
                echo "Songs: <br>";
            }
            $cached_name = $album_name;
            echo "-  " . $song_name . "<br>";
            echo "<br>";
        }
    } else {
        echo "0 results for '$search'";
    }
} else if ($category == "A_names") {
    $sql = "select * from artist,song,album,genre,A_names
        where artist_names like '%$search%' 
        and ar_id = artist_id 
        and al_id = album_id 
        and ge_id = genre_id
        and a_id = ar_id
        order by artist_names, date_added desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            //date_added
            $date_added = $row["date_added"];
            //song_name
            $song_name = $row["song_name"];
            //artist_country
            $artist_country = $row["artist_country"];
            //artist_names
            $artist_names = $row["artist_names"];
            //album_name
            $album_name = $row["album_name"];
            //genre_name
            $genre_name = $row["genre_name"];
            if ($cashe_artist != $artist_names) {
                if ($i != 0) {
                    echo "<br><br>";
                }
                echo "Artist: " . $artist_names . " from " . $artist_country;
            }
            $i = 1;
            if ($cashe_album != $album_name) {
                echo "<br>";
                echo "Album: " . $album_name . " - Genre: " . $genre_name . "<br>";
                echo "Date added: " . $date_added . "<br>";
                echo "Songs: <br>";
            }
            $cashe_album = $album_name;
            $cashe_artist = $artist_names;
            echo "-  " . $song_name . "<br>";
        }
    } else {
        echo "0 results for '$search'";
    }
} else if ($category == "genre") {
    $sql = "select * from artist,song,album,genre,A_names
        where genre_name like '%$search%' 
        and ar_id = artist_id 
        and al_id = album_id 
        and ge_id = genre_id
        and a_id = ar_id
        order by artist_names, date_added desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $l = 0;
        while ($row = $result->fetch_assoc()) {
            //date_added
            $date_added = $row["date_added"];
            //song_name
            $song_name = $row["song_name"];
            //artist_country
            $artist_country = $row["artist_country"];
            //artist_names
            $artist_names = $row["artist_names"];
            //album_name
            $album_name = $row["album_name"];
            //genre_name
            $genre_name = $row["genre_name"];
            if ($cashe_artist != $artist_names) {
                if ($l != 0) {
                    echo "<br><br>";
                } else {
                    echo "Genre: " . $genre_name . "<br>";
                }
                echo "Artist: " . $artist_names . " from " . $artist_country . "<br>";
                $l = 0;
            }
            if ($cashe_album != $album_name) {
                if ($l != 0) {
                    echo "<br>";
                }
                echo "Album: " . $album_name . " - Date added: " . $date_added . "<br>";
                echo "Songs: <br>";
            }
            echo "-  " . $song_name . "<br>";
            $cashe_album = $album_name;
            $cashe_artist = $artist_names;
            $l = 1;
        }
    } else {
        echo "0 results for '$search'";
    }
}
$conn->close();
?>
<p></p>
<button onclick="history.go(-1);">Back </button>

</body>
       </html> 