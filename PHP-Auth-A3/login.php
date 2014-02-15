<?php 
require __DIR__ . '/vendor/autoload.php';
ob_start();
use Symfony\Component\HttpFoundation\Session\Session;
$session = new Session();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ross Newman Assignment 3</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<div class="form">
<form method="post" action="login-process.php">
	<?php 
		foreach($session->getFlashBag()->all() as $type => $messages) {
			foreach ($messages as $message) {
				echo "<div class='flash-$type'>$message</div>\n";
			}
		}
		ob_flush();
	?>
	<div>
		Username: <input type="text" name="username" />
	</div>
	<div>
		Password: <input type="password" name="password" />
	</div>
	<div>
		<input type="submit" value="Login" />
	</div>
</form>
</div>
</body>
</html>