<?php
    $message = "";
    $id = $_POST['aanpassen'];
    $query = db()->prepare("SELECT * FROM projecten WHERE ID=:ID");
    $query->execute(["ID"=>$id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $naam = $result['Naam'];
    $jaar = $result['Jaar'];           
    $beschrijving = $result['Beschrijving'];

    try{
        if(isset($_POST['pasaan'])){
            $naam = $_POST['naam'];
            $jaar = $_POST['jaar'];      
            $beschrijving = $_POST['beschrijving'];
            $id = $_POST['aanpassen']; 
            
            if(empty($naam)||empty($jaar)||empty($beschrijving)){
                $message = "Vul alle gegevens in";
            }else if($startdatum>$einddatum){
                $message = "De startdatum is later dan de einddatum";
            } else {
                //past de ding aan
                $query = db()->prepare("UPDATE projecten SET Naam=:naam, Jaar=:jaar, Beschrijving=:beschrijving WHERE ID=:ID");
                $query->execute(["naam" => $naam, "jaar" => $jaar, "beschrijving" => $beschrijving,"ID"=>$id]);
                //stuurt je terug
                header("location:../../page/project/read.php");
            }
        }
    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>