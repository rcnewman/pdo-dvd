 <?php
require_once 'db.php'; 

class Song
{
	public $title;
	public $artist;
	public $genre;
	public $price;
	public $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	 
	}
    public function setArtistId($artist)
    {
		$this->artist = $artist;
	
	}
    public function setGenreId($genre)
    {
		$this->genre = $genre;	
		
	}
    public function setPrice($price)
    {
		$this->price = $price;		
		
	}
    public function save()
    {
		$sql = "INSERT INTO songs (title,artist_id,genre_id,price) 
		VALUES ('$this->title',$this->artist,$this->genre,$this->price)";
		
		$statement = $this->pdo->prepare($sql);
		
		return $statement->execute();
	}
    public function getTitle()
    {
		return $this->title;	
	}
    public function getId()
    {
		return $this->pdo->lastInsertId();
	}
}

 ?>