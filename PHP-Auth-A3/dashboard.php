<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';
ob_start();
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Carbon\Carbon;

$session = new Session();
if(!($session->get('username'))){
	$response = new RedirectResponse('login.php');
	$response->send();
}
else{
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Ross Newman Assignment 3</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<?php echo 'Username: '.$session->get('username'); ?><br>
		<?php echo 'Email: '.$session->get('email'); ?><br>
		<?php echo 'Last Login: '.$session->get('loginTime')->diffForHumans() ?><br>
		<a href="./logout.php">Logout</a>
	</div>
<?php 
	foreach($session->getFlashBag()->all() as $type => $messages) {
		foreach ($messages as $message) {
			echo "<div class='flash-$type'>$message</div>\n";
		}
	}

	$songQuery = new ITP\Songs\SongQuery($pdo);
	$songs = $songQuery->withArtist()->withGenre()->orderBy('title')->all();
	?>
	<table class="query">
		<tr>
			<td>Title</td>
			<td>Artist</td>
			<td>Genre</td>
			<td>Price</td>
		</tr>
	<?php foreach($songs as $song) : ?>
		<tr>
			<td><?php echo $song->title ?></td>
			<td><?php echo $song->artist_name ?></td>
			<td><?php echo $song->genre ?></td>
			<td><?php echo $song->price ?></td>
		</tr>
<?php endforeach;
	ob_flush();
?>
	</table>
</body>
</html>