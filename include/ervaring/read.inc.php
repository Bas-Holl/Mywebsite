<?php
    $query = db()->prepare("SELECT * FROM ervaringen");
    $query->execute();

    $querytaal = db()->prepare("SELECT * FROM talen");
    $querytaal->execute();

    try{
        if(isset($_POST['taal'])){   
            $talen = $_POST['talen'];      
            $ervaringid = $_POST['ervaring'];

            //kijkt na of het er niet al in zit
            $queryempty = db()->query("SELECT * FROM talen LEFT JOIN tussenervaring ON tussenervaring.TaalID = talen.ID  WHERE ErvaringID = $ervaringid AND TaalID = $talen");
            $resultempty = $queryempty->fetchAll();
            if(empty($resultempty)){       
                $table = db()->prepare("INSERT INTO tussenervaring (taalID, ervaringID) 
                VALUES( :taalID, :ervaringID)");
                $table->execute(["taalID" => $talen, "ervaringID" => $ervaringid]); 
            }
            $test = $querys = db()->prepare("SELECT * FROM talen LEFT JOIN tussenervaring ON tussenervaring.TaalID = talen.ID  WHERE ErvaringID = $ervaringid");
        }
        if(isset($_POST['deletetaal'])){
            $tussenid = $_POST['tussenid'];

            $querytussen = db()->prepare("DELETE FROM tussenervaring WHERE ID = :tussenID");
            $querytussen->bindParam('tussenID',$tussenid);
            $querytussen->execute();
        }
    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>