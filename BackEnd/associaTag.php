<?php

class associaTag{

	//Dichiarazione Attributi
	private $progetto;
	private $tag;
	private $posizione;

	//Dichiarazione Metodi
	public function __construct($array){
		$this->progetto = $array['progetto'];
		$this->tag = $array['tag'];
		$this->posizione = $array['posizione'];
	}

	public function getProgetto(){
		return $this->progetto;
	}

	public function getTag(){
		return $this->tag;
	}

	public function getPosizione(){
		return $this->posizione;
	}
}

?>