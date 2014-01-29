<?php
class GenreMenu
{
	public $genres;
	public $name;
	public function __construct($name, $genres)  
    {  
 		$this->name = $name;
 		$this->genres = $genres;
    }  
	public function __toString()
	{
		$string = "<select name='$this->name'>";
		if(sizeof($this->genres > 0)){
			foreach($this->genres as $genre){
				$string = $string."<option value='$genre->id'>$genre->genre</option>";
			}
		}
		$string = $string.'</select>';
		return $string; 	
	}
}

?>