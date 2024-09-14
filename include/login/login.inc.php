<?php
    //lege error
    $message = "";

    if($_POST){
        $email=$_POST['email'];
        $query = db()->prepare("SELECT * FROM `gebruikers` WHERE Email = :email");
        $query->execute(["email" => $email]);

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            if(empty($result)){
                //error bericht
                $message = "De e-mail en wachtwoord komen niet overeen";

            } else if (password_verify($_POST['password'], $result['Wachtwoord'])) {
                //bericht
                $message = "U bent ingelogt";
                //zet alles in de sessions
                $_SESSION["userId"] = $result['ID'];
                $_SESSION["userLevel"] = $result['Level'];
                $_SESSION["userName"] = $result['Gebruikersnaam'];
                //stuurt je terug naar home
                header("location:../../page/home/home.php");

            } else{
                //error bericht
                $message = "De e-mail en wachtwoord komen niet overeen";

            }
        }
        //error bericht
        $message = "De e-mail en wachtwoord komen niet overeen";
    }
?>