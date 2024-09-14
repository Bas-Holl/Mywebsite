<?php         
try{
    $id = $_POST['verwijderen'];
    //haalt gegevens op om duidelijk te maken voor de gebruiker wat er verwijderd word
    $query = db()->prepare("SELECT * FROM talen WHERE id = :stop");
    $query->bindParam('stop',$id);
    $query->execute();
    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        $naam=$result['Naam'];
    }

    if(isset($_POST['delete'])){
        $id = $_POST['verwijderen'];
        //verwijderd het
        $query = db()->prepare("DELETE FROM talen WHERE id = :stop");
        $query->bindParam('stop',$id);
        $query->execute();
        //stuurt je terug
        header("location:../../page/taal/read.php");
    }
    
} catch (PDOException $e){
    die ("Error!: ".$e->getMessage());
}
?>
