<?php

require 'associaTag.php';

class db_associaTag{

	//Dichiarazione Attributi
	private $associaTag;

    private function getConnection(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_ing";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            return $conn;
    }

	public function register($array){
		$this->associaTag = new associaTag($array);
		$conn = $this->getConnection();
		$sql = "INSERT INTO associaTag (progetto, tag, posizione) VALUES ('".$this->associaTag->getProgetto()."', '".$this->associaTag->getTag()."', '".$this->associaTag->getPosizione()."')";
		$conn->query($sql);
		$conn->close();
	}

	public function delete($array){
		$conn = $this->getConnection();
		$sql = "DELETE FROM associaTag WHERE progetto = ".$array['progetto']." AND tag LIKE '".$array['tag']."'";
		$conn->query($sql);
		$conn->close();
	}

	public function getAssociaTag(){
		return $this->associaTag;
	}

	public function updateProgetto($array, $newProgetto){
		$conn = $this->getConnection();
		$sql = "UPDATE associaTag SET progetto = ".$newProgetto."  WHERE progetto = ".$array['progetto']." AND tag LIKE '".$array['tag']."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updateTag($array, $newTag){
		$conn = $this->getConnection();
		$sql = "UPDATE associaTag SET tag = '".$newTag."'  WHERE progetto = ".$array['progetto']." AND tag LIKE '".$array['tag']."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function updatePosizione($array, $newPosizione){
		$conn = $this->getConnection();
		$sql = "UPDATE associaTag SET posizione = ".$newPosizione."  WHERE progetto = ".$array['progetto']." AND tag LIKE '".$array['tag']."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}


}


?>