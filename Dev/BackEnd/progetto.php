<?php

class progetto{
	//Dichiarazione Attributi	 
	private $id;
	private $leader;
	private $nome;
	private $descrizione;
	private $data_scadenza;
	private $data_creazione;
	private $candidatura;
	private $numero_candidati;
	private $ricercabile;

	//Definizione Metodi
	public function __construct($array){
		if(array_key_exists('id', $array))
			$this->id = $array['id'];
			$this->leader = $array['leader'];
			$this->nome = $array['nome'];
			$this->descrizione = $array['descrizione'];
			$this->data_scadenza = $array['data_scadenza'];
			$this->data_creazione = $array['data_creazione'];

			if(array_key_exists('candidatura', $array))
				$this->candidatura = $array['candidatura'];

			if(array_key_exists('numero_candidati', $array))
				$this->numero_candidati = $array['numero_candidati'];

			if(array_key_exists('ricercabile', $array))
				$this->ricercabile = $array['ricercabile'];
	}

	public function getId(){
		return $this->id;
	}

	public function getLeader(){
		return $this->leader;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getDescrizione(){
		return $this->descrizione;
	}

	public function getData_scadenza(){
		return $this->data_scadenza;
	}

	public function getData_creazione(){
		return $this->data_creazione;
	}

	public function getCandidatura(){
		return $this->candidatura;
	}

	public function getNumero_candidati(){
		return $this->numero_candidati;
	}

	public function getRicercabile(){
		return $this->ricercabile;
	}
}

?>