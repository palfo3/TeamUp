<?php

require 'tag.php';

class db_tag{
	private $tag;

    private function getConnection(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "db_ing";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            return $conn;
    }

	public function register($nome){
		$this->tag = new tag($nome);
		$conn = $this->getConnection();
		$sql = "INSERT INTO tag (nome) VALUES ('".$this->tag->getTag()."')";		
	    $conn->query($sql);
		$conn->close();
	}

	public function delete($Nome){
		$conn = $this->getConnection();
		$sql = "DELETE FROM tag WHERE Nome = ".$Nome;
		$conn->query($sql);
		$conn->close();
	}

	//UPDATE QUERIES
	public function updateNome($oldNome, $newNome){
		$conn = $this->getConnection();
		$sql = "UPDATE tag SET nome = '".$newNome."' WHERE nome LIKE '".$oldNome."'";
		if($conn->query($sql) === TRUE){
			//successfully updated
		}
	}

	public function setTag($nome){
		$conn = $this->getConnection();
		$sql = "SELECT * FROM tag WHERE nome LIKE ".$nome;
		$result = $conn->query($sql);

		if($result->num_rows == 1){
		  // output data of each row
		  $row = $result->fetch_assoc();
		  
		  $this->tag = new tag($row);
		}

		$conn->close();
	}

	public function getTag(){
		return $this->tag;
	}
}

?>