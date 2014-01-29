<?php

class GenreQuery
{
	private $pdo;

	public function __construct($pdo)  
    {  
        $this->pdo = $pdo;
    }  
	public function getAll(){
		$sql = "SELECT id, genre
				FROM genres
				ORDER BY genre
			";
		$statement = $this->pdo->prepare($sql);

		$statement->execute();
		$genres = $statement->fetchAll(PDO::FETCH_OBJ);  
		return $genres;
	} 
}

?>