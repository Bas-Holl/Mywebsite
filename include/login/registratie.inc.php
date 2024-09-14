<?php
    try{
        $message = "";
        if(isset($_POST["registratie"])){
            $message = " ";
            
            //verzamelt alle gegevens
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $password2=$_POST['password2'];

            //kijkt na of email al bestaat
            $queryemail = db()->prepare("SELECT * FROM `gebruikers` WHERE Email = :email");
            $queryemail->execute(["email" => $email]);
            $resultemail = $queryemail->fetchAll(PDO::FETCH_ASSOC);

            if(count($resultemail)){
                $message = "Error dubbele email";
            } else if ($password!=$password2){
                $message = "Error de wachtwoorden komen niet overeen";
            } else if(empty($name)||empty($email)||empty($password)){
                $message = "Error vul alle gegevens in";
            }else{
                //voert gegevens in data base
                $query = db()->prepare("INSERT INTO gebruikers (Email, Gebruikersnaam, Level, Wachtwoord) VALUES(:Email,:Gebruikersnaam,:Level, :Wachtwoord)");
                $query->execute(["Email"=>$email,"Gebruikersnaam"=>$name, "Level"=>1, "Wachtwoord"=>password_hash($password,PASSWORD_DEFAULT)]);

                if(!$query){
                    $message = "Er is een fout opgetreden!";
                } else {
                    header("location:../../page/taal/read.php");
                }
            }
        }
    } catch(PDOException $e){
        die("Error!: ".$e->getMessage());
    }
?>