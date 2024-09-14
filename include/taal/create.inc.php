<?php
    $message = "";
    try{
        if(isset($_POST['toevoeg'])){
            $naam = $_POST['naam']; 
            $taalhulpmiddel = $_POST['taalhulpmiddel']; 

            if(empty($naam)){
                $message = "Error vul alle gegevens in";
            } else {
                //stopt het in de database
                $query = db()->prepare("INSERT INTO talen ( naam,taalhulpmiddel) 
                VALUES(:naam, :taalhulpmiddel)");
                $query->execute(["naam" =>$naam,"taalhulpmiddel" =>$taalhulpmiddel]);
                //stuurt je terug
                header("location:../../page/taal/read.php");
            }

        }
        
    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>