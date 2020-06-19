<?php

require 'utente.php';

class db_utente{

    //dichiarazione attributi
    private $utente;

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

    public function register($user){
        $this->utente = new utente($user);
        $conn = $this->getConnection();
        $sql = "INSERT INTO utente (mail, password, nome, cognome, descrizione) VALUES ".
        "('".$this->utente->getMail()."', '".$this->utente->getPassword()."', '".$this->utente->getNome()."', '".$this->utente->getCognome()."', '".$this->utente->getDescrizione()."')";
        
        $conn->query($sql);
        $conn->close();
    }

    //DELETE QUERY

   public function deleteAccount($mail, $password){
        $conn = $this->getConnection();
        $sql = "DELETE FROM utente WHERE mail = '".$mail."' AND password LIKE '".$password."' ";
        $conn->query($sql);

        $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);       
    }


    //UPDATE QUERIES
    public function updateMail($oldMail, $newMail){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET mail = '".$newMail."' WHERE mail LIKE '".$oldMail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }

 
    public function updatePassword($mail, $newPassword){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET password = '".$newPassword."' WHERE mail LIKE '".$mail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }

 
    public function updateNome($mail, $newNome){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET nome = '".$newNome."' WHERE mail LIKE '".$mail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }

 
    public function updateCognome($mail, $newCognome){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET cognome = '".$newCognome."' WHERE mail LIKE '".$mail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }


    public function updateDescrizione($mail, $newDescrizione){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET descrizione = '".$newDescrizione."' WHERE mail LIKE '".$mail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }


    public function updateNascita($mail, $newNascita){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET nascita = '".$newNascita."' WHERE mail LIKE '".$mail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }

 
    public function updateImmagine($mail, $newImmagine){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET immagine = '".$newImmagine."' WHERE mail LIKE '".$mail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }

 
    public function updateCurriculum($mail, $newCurriculum){
        $conn = $this->getConnection();
        $sql = "UPDATE utente SET curriculum = '".$newCurriculum."' WHERE mail LIKE '".$mail."'";
        if($conn->query($sql) === TRUE){
            //successfully updated
        }
    }
 
    //In base all'email e la password inserita ricavo nome e cognome dell'utente
    public function access_User($mail, $password){
        $conn = $this->getConnection();
        $sql = "SELECT * FROM utente WHERE mail LIKE '".$mail."' AND password LIKE '".$password."'";
        $result = $conn->query($sql);
        $conta = mysqli_num_rows($result);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['cognome'] = $row['cognome'];
            $_SESSION['mail'] = $row['mail'];

            echo $_SESSION['nome'];

            return true;
        }else{
            return false;
        }
    }
    //END UPDATE QUERIES

    //Controllo che l'email sia presente nel database
    public function checkUtente($mail){
        $conn = $this->getConnection();
        $sql = "SELECT * FROM utente WHERE mail LIKE '".$mail."'";
        $result = $conn->query($sql);

        if($result->num_rows == 1) {
          // output data of each row
            return false;
        }else{
            return true;
        }
    }
 
    // Funzione per la modifica della password
    public function checkUtentePass($mail, $oldpassword, $newpassword){
        $conn = $this->getConnection();
        $sql = "SELECT password FROM utente WHERE mail LIKE '".$mail."'";
        $result = $conn->query($sql);

        if($result->num_rows == 1) {
                $utente = new db_utente(); 
                $row = $result->fetch_assoc();
                if($oldpassword == $row['password']){
                    $utente->updatePassword($mail, $newpassword);   
                }else{
                    echo "password sbagliata";
                }
            }else{
                    echo "mail sbagliata";
                }
        }

    public function setUtente($mail){
        $conn = $this->getConnection();
        $sql = "SELECT * FROM utente WHERE mail LIKE '".$mail."'";
        $result = $conn->query($sql);

        if($result->num_rows == 1) {
          //fetch_assoc recupera la riga dal database come un array associativo.
          //Tale è un array i cui elementi sono accessibili mediante nomi, quindi stringhe anziché indici puramente numerici.
          //$row è il vettore associativo
          $row = $result->fetch_assoc();
          $this->utente = new utente($row);
        }
        $this->utente = new utente($row);
        $conn->close();
    }

    public function getUtente(){
        return $this->utente;
    }

}
    /*Testing della classe
    //test funzione register()
    {
            $array = array( "mail" => "gaetano@mail.it",
                            "password" => "simp123",
                            "nome" => "gaetano",
                            "cognome" => "cassano",
                            "descrizione" => "I\'m gay");

            $interface = new db_utente();
            $interface->register($array);
    }*/
?>