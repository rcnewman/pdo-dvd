<?php 
namespace ITP;
//require __DIR__ . '/vendor/autoload.php';

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';
use Symfony\Component\HttpFoundation\Session\Session;

class Auth{
	private $pdo;

	public function __construct($pdo)  
    {  
        $this->pdo = $pdo;
    }

	public function attempt($username,$password)
	{
		$passwordSha1 = sha1($password);
		$sql = "SELECT * 
				FROM users 
				WHERE username = \"$username\" 
				AND password = \"$passwordSha1\"
				";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		$authenticator = $statement->fetchAll(\PDO::FETCH_OBJ); 

		if (sizeof($authenticator) == 1) {
			$session = new Session();

			$session->set('email',$authenticator[0]->email); 
			return true;
		}
		return false;
	}	
}
?>