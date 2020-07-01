<?php

require 'candidato.php';

class db_candidato{

	//dichiarazione attributi
	private $candidato;

	//Definizione Metodi
	private function getConnection(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_ing";

			// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);	
		return $conn;
	}

	//Controllo che l'utente sia candidato
    public function checkCandidato($mail, $id){
        $conn = $this->getConnection();
        $sql = "SELECT * FROM candidato WHERE utente LIKE '".$mail."' AND progetto LIKE '".$id."'";
        $result = $conn->query($sql);

        if($result->num_rows == 1) {
          // output data of each row
            return true;
        }else{
            return false;
        }
    }

	public function register($candidate){
		$this->candidato = new candidato($candidate);
		$conn = $this->getConnection();
		$sql = "INSERT INTO candidato (utente, progetto) VALUES ('".$this->candidato->getMail()."', '".$this->candidato->getID()."')";
		$conn->query($sql);

		$conn->close();
	}

	//UPDATE QUERIES
	public function updateMail($oldMail, $newMail){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET utente = '".$newMail."' WHERE utente LIKE '".$oldMail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateID($mail, $newID){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET ID = '".$newID."' WHERE utente LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateAccettato($mail, $id, $newAccettato){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET accettato = '".$newAccettato."' WHERE utente LIKE '".$mail."' AND progetto = ".$id;
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	//END UPDATE QUERIES

	public function setCandidato($mail, $id){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM candidato WHERE utente LIKE \'".$mail."\' AND progetto = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
			$row = $result->fetch_assoc();

			$candidato = new candidato($row);
		}

		$candidato = new candidato($row);
		$conn->close();
		
	}

	public function setAllCandidati($id) {
		$conn = $this->getConnection();
		$sql = "SELECT * FROM candidato WHERE progetto = ".$id." AND accettato = '0'";
		$result = $conn->query($sql);

		if ($result->num_rows >= 1) {
		  // output data of each row
			return $result;
		}

		return null;
	}

	public function setAllAccettati($id) {
		$conn = $this->getConnection();
		$sql = "SELECT * FROM candidato WHERE progetto = ".$id." AND accettato = '1'";
		$result = $conn->query($sql);

		if ($result->num_rows >= 1) {
		  // output data of each row
			return $result;
		}

		return null;
	}

	public function setAllProgetti($mail) {
		$conn = $this->getConnection();
		$sql = "SELECT * FROM candidato WHERE utente LIKE '".$mail."'";
		$result = $conn->query($sql);

		if ($result->num_rows >= 1) {
		  // output data of each row
			return $result;
		}

		return null;
	}

	public function EliminaCandidatura($utente, $id){
		$conn = $this->getConnection();
		$sql = "DELETE FROM candidato WHERE utente LIKE '".$utente."' AND progetto = '".$id."'";
		$result = $conn->query($sql);

		$conn->close();		
	}

	public function getCandidato(){
		return $this->candidato;
	}



}




?>