<?php
    $host = "localhost";
    $usuario = "root";
    $pass = "";
    $nomeDB = "dizionario";

    $pdb = "dizi"; 


    error_reporting(0);


    $connessione = new mysqli($host,$usuario,$pass,$nomeDB);
    if($connessione->connect_errno){
        echo 'vi è stato un errore durante la connessione';
        exit();
    }

?>