<?php

class candidato{
	//Dichiarazione Attributi	 
	private $mailUtente;
	private $progettoID;
	private $accettato;



	//Definizione Metodi
	public function __construct($array){
		$this->mailUtente = $array['mailUtente'];
		$this->progettoID = $array['progettoID'];
		if(array_key_exists('accettato', $array))
			$this->accettato = $array['accettato'];
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


}


?>