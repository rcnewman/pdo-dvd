<?php
$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pass = 'ttrojan';

$title = $_GET['title']; // $_REQUEST['artist']
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

?>
 <h3>
 	You searched for "<?php echo $title; ?>"
 </h3>
<?php if (sizeof($movies) > 0) {?>
    <table>
        <tr>
            <td>Title</td>
            <td>Rating</td>
            <td>Genre</td>
            <td>Format</td>
        </tr>
        <?php foreach($movies as $movie) : ?>
        <tr>
            <td><?php echo $movie->title; ?></td>
            <td><?php echo $movie->rating; ?></td>
            <td><?php echo $movie->genre; ?></td>
            <td><?php echo $movie->format; ?></td>
        </tr>
        <?php endforeach ?>
    </table>

<?php }

    else {
    echo 'Nothing was found, please <a href="search.php">return</a>';
    }
?>


