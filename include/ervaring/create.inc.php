<?php
    //error bericht
    $message = "";

    $querytaal = db()->prepare("SELECT * FROM talen");
    $querytaal->execute();

    try{
        if(isset($_POST['toevoeg'])){
            $bedrijf = $_POST['bedrijf']; 
            $functie = $_POST['functie']; 
            $startdatum = $_POST['startdatum']; 
            $einddatum = $_POST['einddatum'];  
            $beschrijving = $_POST['beschrijving']; 
            $talen = $_POST['talen']; 

            if(empty($bedrijf)||empty($functie)||empty($startdatum)||empty($beschrijving)){
                $message = "Error vul alle gegevens in";
            }else if($startdatum>$einddatum && empty(!$einddatum)){
                $message = "Error de startdatum is later dan de einddatum";
            } else {
                //stopt het in de database
                $query = db()->prepare("INSERT INTO ervaringen ( bedrijf, functie, startdatum, einddatum, beschrijving) 
                VALUES( :bedrijf, :functie, :startdatum, :einddatum, :beschrijving)");
                $query->execute(["bedrijf" => $bedrijf, "functie" => $functie, "startdatum" => $startdatum, "einddatum" => $einddatum, 
                "beschrijving" => $beschrijving]);

                //kijkt welke ID net aangemaakt is
                $querys = db()->prepare("SELECT * FROM ervaringen ORDER BY ID DESC LIMIT 1");
                $querys->execute();

                //zet de id's in de tussen tabel
                while ($results = $querys->fetch(PDO::FETCH_ASSOC)) {
                    $table = db()->prepare("INSERT INTO tussenervaring (taalID, ervaringID) 
                    VALUES( :taalID, :ervaringID)");
                    $table->execute(["taalID" => $talen, "ervaringID" => $results["ID"]]);
                }

                //stuurt je terug
                header("location:../../page/ervaring/Read.php");
            }
        }
    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>