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

	public function register($candidate){
		$this->candidato = new candidato($candidate);
		$conn = $this->getConnection();
		$sql = "INSERT INTO candidato (utente, progetto, accettato, curriculum) VALUES ".
		"('".$this->candidato->getMail()."', '".$this->candidato->getID()."', '".$this->candidato->getAccettato()."', '".$this->candidato->getCurriculum()."')";

		$result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
	}

	//UPDATE QUERIES
	public function updateMail($oldMail, $newMail){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET mail = '".$newMail."' WHERE mail LIKE '".$oldMail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateID($mail, $newID){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET ID = '".$newID."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateAccettato($mail, $newAccettato){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET Accettato = '".$newAccettato."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateCurriculum($mail, $newCurriculum){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET Curriculum = '".$newCurriculum."' WHERE mail LIKE '".$mail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}
	//END UPDATE QUERIES

	public function setCandidato($mail, $id){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM candidato WHERE mailutente LIKE '".$mail."' AND progettoid = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		  $candidato = new candidato($row);
		}
		$conn->close();		
	}

	public function RicercaTeammate($utente){
		$conn = $this->getConnection();
		$sql = "SELECT utente FROM candidato WHERE utente LIKE '".$utente."' AND accettato = '1'";
		$result = $conn->query($sql);
		
		if($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  echo $row['utente'];
		  return TRUE;
		}
		$conn->close();		
	}

	public function EliminaTeammate($utente, $id){
		$conn = $this->getConnection();
		$sql = "DELETE FROM candidato WHERE utente LIKE '".$utente."' AND accettato = '0' AND progetto LIKE '".$id."'";
		$result = $conn->query($sql);
		
		if($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  echo $row['utente'];
		  return TRUE;
		}
		$conn->close();		
	}



	public function Licenziato($utente){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET accettato = '0' WHERE utente LIKE '".$utente."'";
		$result = $conn->query($sql);
			//successfully updated
		
		$result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
	}

	public function getCandidato(){
		return $this->candidato;
	}
}	

?>