<?php         
try{
    $id = $_POST['verwijderen'];
    //haalt gegevens op om duidelijk te maken voor de gebruiker wat er verwijderd word
    $query = db()->prepare("SELECT * FROM ervaringen WHERE id = :stop");
    $query->bindParam('stop',$id);
    $query->execute();
    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        $bedrijf=$result['Bedrijf'];
    }

    if(isset($_POST['delete'])){
        $id = $_POST['verwijderen'];
        //verwijderd het
        $query = db()->prepare("DELETE FROM ervaringen WHERE id = :stop");
        $query->bindParam('stop',$id);
        $query->execute();

        $querytussen = db()->prepare("DELETE FROM tussenervaring WHERE ErvaringID = :stop");
        $querytussen->bindParam('stop',$id);
        $querytussen->execute();
        
        //stuurt je terug
        header("location:../../page/ervaring/read.php");
    }
    
} catch (PDOException $e){
    die ("Error!: ".$e->getMessage());
}
?>
