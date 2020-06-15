<?php

//require 'upload.php';
require 'db_utente.php'
$modifica = new utente($_POST);
$utente = new db_utente();
$utente->setUtente($_SESSION['mail']);


if($utente->getUtente()->getNome() != $modifica->getNome())
{
    $utente->updateNome($utente->getUtente()->getMail(), $modifica->getNome());
}

if($utente->getUtente()->getCognome() != $modifica->getCognome())
{
    $utente->updateCognome($utente->getUtente()->getMail(), $modifica->getCognome());
}

if($utente->getUtente()->getDescrizione() != $modifica->getDescrizione())
{
    $utente->updateDescrizione($utente->getUtente()->getMail(), $modifica->getDescrizione());
}

if($utente->getUtente()->getNascita() != $modifica->getNascita())
{
    $utente->updateNascita($utente->getUtente()->getMail(), $modifica->getNascita());
}

if($utente->getUtente()->getImmagine() != $modifica->getImmagine())
{
    uploadFile($utente->getUtente()->getMail(), $_FILES['userfile']);
}

if($utente->getUtente()->getPassword() != $modifica->getPassword())
{
    $utente->checkUtentePass($utente->getUtente()->getMail(), $modifica->getPassword());
}

if($utente->getUtente()->getMail() != $modifica->getMail())
{
    $utente->updateMail($utente->getUtente()->getMail(), $modifica->getMail());
}





?>