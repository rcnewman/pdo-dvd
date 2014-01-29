<?php
class ArtistMenu
{
	public $artists;
	public $name;
	public function __construct($name, $artists)  
    {  
 		$this->name = $name;
 		$this->artists = $artists;
    }  
	public function __toString()
	{
		$string = "<select name='$this->name'>";
		if(sizeof($this->artists > 0)){
			foreach($this->artists as $artist){
				$string = $string."<option value='$artist->id'>$artist->artist_name</option>";
			}
		}
		$string = $string.'</select>';
		return $string; 	
	}
}

?>