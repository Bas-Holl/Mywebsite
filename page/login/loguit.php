<?php
    //sloopt de sessie en logt je daar mee uit
    session_unset();
    session_destroy();
    setcookie(session_name(),'',0,'/');
    
    //stuurt je terug naar de home
    header("location:../../page/home/home.php");
    
    //Oproepen van de navigatie
    require_once "../../functies/navbar.php";

    //als dit te zien is op beeld is iets hierboven fout gegaan.
    echo "Error er is iets fout gegaan.";
    echo "</br>".$_SESSION["userLevel"];
?>
</body>
</html>