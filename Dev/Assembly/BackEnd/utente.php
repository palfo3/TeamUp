<?php

class utente{
	//Dichiarazione Attributi	 
	private $mail;
	private $password;
	private $nome;
	private $cognome;
	private $descrizione;
	private $nascita;
	private $immagine;
	private $curriculum;


	//Definizione Metodi
	public function __construct($array){
		$this->mail = $array['mail'];
		$this->password = $array['password'];
		$this->nome = $array['nome'];
		$this->cognome = $array['cognome'];
		$this->descrizione = $array['descrizione'];
		if(array_key_exists('nascita', $array))
			$this->nascita = $array['nascita'];

		if(array_key_exists('immagine', $array))
			$this->immagine = $array['immagine'];

		if(array_key_exists('curriculum', $array))
			$this->curriculum = $array['curriculum'];
	}

	public function getMail(){
		return $this->mail;
	}

	public function getPassword(){
		return $this->password;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getCognome(){
		return $this->cognome;
	}

	public function getDescrizione(){
		return $this->descrizione;
	}

	public function getNascita(){
		return $this->nascita;
	}

	public function getImmagine(){
		return $this->immagine;
	}

	public function getCurriculum(){
		return $this->curriculum;
	}
}

?>