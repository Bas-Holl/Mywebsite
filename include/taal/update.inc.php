<?php
    $message = "";
    $id = $_POST['aanpassen'];
    $query = db()->prepare("SELECT * FROM talen WHERE ID=:ID");
    $query->execute(["ID"=>$id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $naam = $result['Naam'];

    try{
        if(isset($_POST['pasaan'])){
            $naam = $_POST['naam'];
            $taal = $_POST['taalhulpmiddel'];
            $id = $_POST['id']; 
            
            if(empty($naam)){
                $message = "Error vul alle gegevens in";
            } else {
                //past de ding aan
                $query = db()->prepare("UPDATE talen SET Naam=:Naam, TaalHulpmiddel=:TaalHulpmiddel WHERE ID=:ID");
                $query->execute(["Naam" =>$naam,"TaalHulpmiddel"=>$taal,"ID"=>$id]);
                //stuurt je terug
                header("location:../../page/taal/read.php");
            }
        }

    } catch (PDOException $e){
        die ("Error!: ".$e->getMessage());
    }
?>