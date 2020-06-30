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
		return $candidato->mailUtente;
	}

	public function getID(){
		return $candidato->progettoID;
	}

	public function getAccettato(){
		return $candidato->accettato;
	}


}


?>