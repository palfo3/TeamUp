<?php 

class tag{
	//Dichiarazione Attributi
	private $tag;

	//Dichiarazione Metodi
	public function __construct($tag){
		$this->tag = $tag;
	}

	public function getTag(){
		return $this->tag;
	}


}


?>