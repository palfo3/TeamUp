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
		$sql = "UPDATE candidato SET utente = '".$newMail."' WHERE utente LIKE '".$oldMail."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateID($mail, $id, $newID){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET progetto = '".$newID."' WHERE utente LIKE '".$mail."' AND progetto = ".$id;
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

	public function updateCurriculum($mail, $id, $newCurriculum){
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET curriculum = '".$newCurriculum."' WHERE utente LIKE '".$mail."' AND progetto = ".$id;
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}
	//END UPDATE QUERIES

	public function setCandidato($mail, $id){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM candidato WHERE utente LIKE '".$mail."' AND progetto = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		  $candidato = new candidato($row);
		}
		$conn->close();		
	}

	public function RicercaTeammate($utente, $id){
		$conn = $this->getConnection();
		$sql = "SELECT utente FROM candidato WHERE utente LIKE '".$utente."' AND accettato = '1' AND progetto = ".$id;
		$result = $conn->query($sql);
		
		if($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  return TRUE;
		}
		$conn->close();		
	}

	// Controllo che il campo accettato sia 0, se è uguale a 
	public function EliminaCandidatura($utente){
		$conn = $this->getConnection();
<<<<<<< Updated upstream
		$sql = "DELETE FROM candidato WHERE utente LIKE '".$utente."' AND accettato = '0' AND progetto = '".$id."'";
=======
		$sql = "DELETE FROM candidato WHERE utente LIKE '".$utente."' AND accettato = '0'";
>>>>>>> Stashed changes
		$result = $conn->query($sql);

		$conn->close();		
	}

<<<<<<< Updated upstream


	public function Licenziato($utente, $id){
=======
	// Abbandono progetto o Espulsione teammate
	// Viene modificato il campo accettato nella tabaella candidato (uguale a 1) e modificato a 0
	public function EliminaTeammate($utente){
>>>>>>> Stashed changes
		$conn = $this->getConnection();
		$sql = "UPDATE candidato SET accettato = '0' WHERE utente LIKE '".$utente."'AND progetto = ".$id;
		$result = $conn->query($sql);
		
		//$result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
	}

	public function getCandidato(){
		return $this->candidato;
	}
}	

?>