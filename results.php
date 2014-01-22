<?php
$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pass = 'ttrojan';

title = $_GET['title']; // $_REQUEST['artist']
$pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

$sql = "SELECT title, rating, genre, format
		FROM dvd_titles AS d
		INNER JOIN ratings
		ON d.rating_id = ratings.id
		INNER JOIN genres
		ON d.genre_id = genres.id
		INNER JOIN formats
        ON d.format_id = formats.id
        WHERE title LIKE ?
";
$statement = $pdo->prepare($sql);
$like = '%'.$title.'%';
$statement->bindParam(1,$like);

$statement->execute();
$movies = $statement->fetchAll(PDO::FETCH_OBJ);

//var_dump($songs);

foreach($movies as $movie) : ?>
 <h3>
 	<?php echo $movie->g_name ?> - <?php echo $song-> title?>
 </h3>
 <p> Play Count: <?php echo $song->play_count ?></p>
 <p> $<?php echo $song->price ?></p>
<?php endforeach; ?>
