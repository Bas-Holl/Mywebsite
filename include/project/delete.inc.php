<?php         
try{
    $id = $_POST['verwijderen'];
    //haalt gegevens op om duidelijk te maken voor de gebruiker wat er verwijderd word
    $query = db()->prepare("SELECT * FROM projecten WHERE id = :stop");
    $query->bindParam('stop',$id);
    $query->execute();
    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        $naam=$result['Naam'];
    }

    if(isset($_POST['delete'])){
        $id = $_POST['verwijderen'];
        //verwijderd het
        $query = db()->prepare("DELETE FROM projecten WHERE id = :stop");
        $query->bindParam('stop',$id);
        $query->execute();

        $querytussen = db()->prepare("DELETE FROM tussenprojecten WHERE ProjectID = :stop");
        $querytussen->bindParam('stop',$id);
        $querytussen->execute();
        
        //stuurt je terug
        header("location:../../page/project/read.php");
    }
    
} catch (PDOException $e){
    die ("Error!: ".$e->getMessage());
}
?>
