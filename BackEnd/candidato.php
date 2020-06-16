<?php

class candidato{
	//Dichiarazione Attributi	 
	private $mailUtente;
	private $progettoID;
	private $accettato;
	private $curriculum;


	//Definizione Metodi
	public function __construct($array){
		$this->mailUtente = $array['mailUtente'];
		$this->progettoID = $array['progettoID'];
		if(array_key_exists('accettato', $array))
			$this->accettato = $array['accettato'];

		if(array_key_exists('curriculum', $array))
			$this->curriculum = $array['curriculum'];
	}

	public function getMail(){
		return $this->mailUtente;
	}

	public function getID(){
		return $this->progettoID;
	}

	public function getAccettato(){
		return $this->accettato;
	}

	public function getCurriculum(){
		return $this->curriculum;
	}
}

?>