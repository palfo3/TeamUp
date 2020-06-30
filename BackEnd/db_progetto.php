<?php

require 'progetto.php';

class db_progetto{

	//dichiarazione attributi
	private $progetto;

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

	public function register($project){
		$this->progetto = new progetto($project);
		$conn = $this->getConnection();
		$sql = "INSERT INTO progetto (leader, nome, descrizione, data_scadenza, data_creazione) VALUES ('".$this->progetto->getLeader()."', '".$this->progetto->getNome()."', '".$this->progetto->getDescrizione()."', '".$this->progetto->getData_scadenza()."', '".$this->progetto->getData_creazione()."')";
		$conn->query($sql);
		$conn->close();
	}

	public function delete($id){
		$conn = $this->getConnection();
		$sql = "DELETE FROM progetto WHERE id = ".$id;
		$conn->query($sql);
		$conn->close();
	}

	//UPDATE QUERIES
	public function updateid($oldid, $newid){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET id = '".$newid."' WHERE id LIKE '".$oldid."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateLeader($id, $newLeader){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Leader = '".$newLeader."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateNome($id, $newNome){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET nome = '".$newNome."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateDescrizione($id, $newDescrizione){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Descrizione = '".$newDescrizione."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateData_scadenza($id, $newData_scadenza){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Data_scadenza = '".$newData_scadenza."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateData_creazione($id, $newData_creazione){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Data_creazione = '".$newData_creazione."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updateds
		}
	}

	public function updateCandidatura($id, $newCandidatura){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Candidatura = '".$newCandidatura."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateNumero_candidati($id, $newNumero_candidati){
		$conn = $this->getConnection();
		$sql = "UPDATE progetto SET Numero_candidati = '".$newNumero_candidati."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateRicercabile($id, $newRicercabile){
		$conn = $this->getConnection();
		$sql = "UPDATE utente SET Ricercabile = '".$newRicercabile."' WHERE id LIKE '".$id."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function search_id($mail, $data_creazione){
		$conn = $this->getConnection();
		$sql = "SELECT id FROM progetto WHERE leader LIKE '".$mail."' AND data_creazione = '".$data_creazione."' ORDER BY id DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['id'];
	}

	public function Ricerca_Progetto($nome_p){
		$conn = $this->getConnection();
		$sql = "SELECT nome FROM progetto WHERE nome = '".$nome_p."'";
		$result = $conn->query($sql);

		if($result->num_rows == 1){
		  // output data of each row
		  $row = $result->fetch_assoc();
          return TRUE;
      	}
	}

	public function setProgetto($id){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM progetto WHERE id = ".$id;
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		  $this->progetto = new progetto($row);
		}
		$conn->close();
	}

	public function getProgetto(){
		return $this->progetto;
	}

	public function getArrayProgetti($ricerca){
		$conn = $this->getConnection();
		if($limit <= 0)	$limit = 20;
		$sql = "SELECT DISTINCT id, nome, descrizione, data_scadenza FROM progetto LEFT OUTER JOIN associatag on id = progetto WHERE ricercabile=1 AND (nome LIKE '%".$ricerca."%' OR tag LIKE '%".$ricerca."%') ORDER BY data_creazione DESC";
		$result = $conn->query($sql);
		$array = array();


		for($i=0; $i < $result->num_rows; $i++){
			$row = $result->fetch_assoc();
			$project = new progetto($row);
			$array[] = $project;
		}

		$conn->close();
		return $array;

	}
}
?>