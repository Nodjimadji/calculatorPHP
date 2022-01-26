<?php
    $servername = "localhost:3308";
    $username   = "root";
    $password   = "";
    $port       = "3308";


    //Connection MySql
    try{
        $connection = new PDO("mysql:host=$servername;dbname=calculatrice", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Insertion of entries - No security  because anyone can inject sql code
        // $insertion = "INSERT INTO resultat(response) VALUES ($resp)";
        // $connection->exec($insertion);

        //Security is implemented here
        $requete = $connection-> prepare ("INSERT INTO resultat(response) VALUES (:resp)");
        $requete->bindParam(':resp', $resp);
        $requete->execute();

        $query = $connection->prepare("SELECT response FROM resultat ORDER BY id DESC LIMIT 0,1");
        $query->execute();
        $resultat = $query->fetchall();

    }catch(PDOException $err){
        echo 'Echec : ' .$err->getMessage();
    }
    // close connection
    $connection=null;
?>
