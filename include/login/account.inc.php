<?php
$message = "";
//haalt de gegevens op en zet ze in variabelen
try{
    $id =  $_SESSION["userId"];
    $query = db()->prepare("SELECT * FROM gebruikers WHERE ID= '$id'" );
    $query->execute();
    $result = $query->fetchAll (PDO::FETCH_ASSOC);
    foreach($result as &$data){
        $gebruiker = $data['Gebruikersnaam'];
        $email = $data['Email'];
        $level = $data['Level'];
        $iduser = $data['ID'];
    }
}catch (PDOException $e){
    die("Error!: ".$e->getMessage());
}
//kijkt of iets is ingevuld en veranderd vervolgens de gegevens
if(empty($_POST['gebruiker'])){}else{
    $gebruiker = $_POST['gebruiker'];
    $query = db()->prepare("UPDATE gebruikers SET Gebruikersnaam = :gebruikernaam where ID = :id");
    $message ="Gebruikersnaam veranderd naar ".$_POST['gebruiker'];
    $query->execute(["gebruikernaam"=>$gebruiker,"id"=>$id]);
}

//kijkt of iets is ingevuld en veranderd vervolgens de gegevens
if(empty($_POST['email'])){}else{
    $email = $_POST['email'];
    $query = db()->prepare("UPDATE gebruikers SET Email= :email where ID = :id");
    $message ="Email veranderd naar ".$_POST['email'];
    $query->execute(["email"=>$email,"id"=>$id]);
}

//kijkt na of de wachtwoorden overeen komen en past ze vervolgens aan
if(empty($_POST['password'])&&empty($_POST['password2'])){}
    else if($_POST['password']!=false&&$_POST['password2']==$_POST['password']){
    $wachtwoord = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $query = db()->prepare("UPDATE gebruikers SET Wachtwoord ='$wachtwoord' where ID = $id");
    $message ="Wachtwoord veranderd naar ******";
    $query->execute();
} else if($_POST['password']!=$_POST['password2']) {
    $message ="Wachtwoord komen niet overeen.";
} 

//verwijderd de account
if(array_key_exists('verwijder', $_POST)){
    $query = db()->prepare("DELETE FROM gebruikers WHERE ID= $id");
    $message =" Account verwijderd";
    $query->execute();
    header("location:../../page/home/home.php");
}

?>