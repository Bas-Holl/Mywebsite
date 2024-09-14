<?php
    //error bericht
    $message = "";

    $querytaal = db()->prepare("SELECT * FROM talen");
    $querytaal->execute();

    try{
        if(isset($_POST['toevoeg'])){
            $naam = $_POST['naam']; 
            $jaar = $_POST['jaar'];
            $beschrijving = $_POST['beschrijving']; 
            $talen = $_POST['talen']; 

            if(empty($naam)||empty($jaar)||empty($beschrijving)){
                $message = "Error vul alle gegevens in";
            }else if($startdatum>$einddatum){
                $message = "Error de startdatum is later dan de einddatum";
            } else {
                //stopt het in de database
                $query = db()->prepare("INSERT INTO projecten ( naam, jaar, beschrijving) 
                VALUES( :naam, :jaar, :beschrijving)");
                $query->execute(["naam" => $naam, "jaar" => $jaar, 
                "beschrijving" => $beschrijving]);

                //kijkt welke ID net aangemaakt is
                $querys = db()->prepare("SELECT * FROM projecten ORDER BY ID DESC LIMIT 1");
                $querys->execute();

                //zet de id's in de tussen tabel
                while ($results = $querys->fetch(PDO::FETCH_ASSOC)) {
                    $table = db()->prepare("INSERT INTO tussenprojecten (taalID, projectID) 
                    VALUES( :taalID, :projectID)");
                    $table->execute(["taalID" => $talen, "projectID" => $results["ID"]]);
                }

                //stuurt je terug
                header("location:../../page/project/read.php");
            }
        }
    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>