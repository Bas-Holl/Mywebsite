<?php
    $query = db()->prepare("SELECT * FROM projecten ORDER BY Jaar desc");
    $query->execute();

    $querytaal = db()->prepare("SELECT * FROM talen");
    $querytaal->execute();

    try{
        //voegt een taal toe aan de project
        if(isset($_POST['taal'])){   
            $talen = $_POST['talen'];      
            $projectid = $_POST['project'];

            //kijkt na of het er niet al in zit
            $queryempty = db()->query("SELECT * FROM talen LEFT JOIN tussenprojecten ON tussenprojecten.TaalID = talen.ID  WHERE ProjectID = $projectid AND TaalID = $talen");
            $resultempty = $queryempty->fetchAll();
            if(empty($resultempty)){       
                $table = db()->prepare("INSERT INTO tussenprojecten (taalID, ProjectID) 
                VALUES( :taalID, :projectID)");
                $table->execute(["taalID" => $talen, "projectID" => $projectid]); 
            }
        }

        //verwijderd de taal uit de project
        if(isset($_POST['deletetaal'])){
            $tussenid = $_POST['tussenid'];

            $querytussen = db()->prepare("DELETE FROM tussenprojecten WHERE ID = :tussenID");
            $querytussen->bindParam('tussenID',$tussenid);
            $querytussen->execute();
        }

        //verwijderd de afbeelding uit de project
        if(isset($_POST['deleteafbeelding'])){
            $projectid = $_POST['projectid'];
            $afbeeldingnaam = $_POST['afbeeldingnaam'];

            $querytussen = db()->prepare("DELETE FROM uploads WHERE ID = :projectID");
            $querytussen->bindParam('projectID',$projectid);
            $querytussen->execute();
            unlink('../../page/project/uploads/'.$afbeeldingnaam);
        }
    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>