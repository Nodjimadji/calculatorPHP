<?php
    $servername = "localhost:3308";
    $username   = "root";
    $password   = "";
    $port       = "3308";


    //Connection MySql
    try{
        $connection = new PDO("mysql:host=$servername;dbname=calculatrice", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Select the last value and print it
        $query = $connection->prepare("SELECT response FROM resultat ORDER BY id DESC LIMIT 0,1");
        $query->execute();
        $resultat = $query->fetchall();

        echo '<pre>';
        print_r($resultat);
        echo '</pre>';

    }catch(PDOException $err){
        echo 'Echec : ' .$err->getMessage();
    }
    // close connection
    $connection=null;
?>

<a href="../index.php">calculatrice</a>
