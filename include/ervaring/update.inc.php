<?php
    $message = "";
    $id = $_POST['aanpassen'];
    $query = db()->prepare("SELECT * FROM ervaringen WHERE ID=:ID");
    $query->execute(["ID"=>$id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $bedrijf = $result['Bedrijf'];
    $functie = $result['Functie'];
    $startdatum = $result['StartDatum'];
    $einddatum = $result['EindDatum'];            
    $beschrijving = $result['Beschrijving'];

    try{
        if(isset($_POST['pasaan'])){
            $bedrijf = $_POST['bedrijf'];
            $functie = $_POST['functie'];
            $startdatum = $_POST['startdatum'];
            $einddatum = $_POST['einddatum'];            
            $beschrijving = $_POST['beschrijving'];
            $id = $_POST['aanpassen']; 
            
            //kijkt of er niks leeg is gebleven
            if(empty($bedrijf)||empty($functie)||empty($startdatum)||empty($beschrijving)){
                $message = "Error vul alle gegevens in";
            }else if($startdatum>$einddatum && empty(!$einddatum)){
                $message = "Error de startdatum is later dan de einddatum";
            } else {
                //past de ding aan
                $query = db()->prepare("UPDATE ervaringen SET Bedrijf=:bedrijf, Functie=:functie, StartDatum=:startdatum, EindDatum=:einddatum, Beschrijving=:beschrijving WHERE ID=:ID");
                $query->execute(["bedrijf" => $bedrijf, "functie" => $functie, "startdatum" => $startdatum, "einddatum" => $einddatum, "beschrijving" => $beschrijving,"ID"=>$id]);
                //stuurt je terug
                header("location:../../page/ervaring/Read.php");
            }
        }
    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>