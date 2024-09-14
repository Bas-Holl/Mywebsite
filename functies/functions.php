<?php
    function db(){
        return $db = new PDO("mysql:host=localhost;dbname=stageproject2", "root", "");
    }

    function prev_post(string $post){
        //stopt de vorige post in de nieuwe
        echo !empty($_POST[$post]) ? $_POST[$post] : "";
    }

    function UserLevel(string $vanaf){
        //kijkt na of je op de pagina mag zijn en stuurt je anders terug naar de home
        if(isset($_SESSION["userLevel"])){
            if(!$_SESSION["userLevel"]>=$vanaf){
                return header("location:../../page/home/home.php");
            }
        } else {
            return header("location:../../page/home/home.php");
        }
    }

    function NavUserLevel(string $vanaf, string $link){
        //kijkt na of je op de pagina mag zijn en stuurt je ander terug naar de home
        if(isset($_SESSION["userLevel"])){
            if($_SESSION["userLevel"]>=$vanaf){
                return $link;
            }
        }
    }

    function Loggedout(string $link){
        //kijkt na of je ingelogd bent en zo niet geeft de string terug
        if(!isset($_SESSION["userLevel"])){
            return $link;
        }
    }

    function Loggedin(string $link){
        //kijkt na of je ingelogd bent en zo niet geeft de string terug
        if(isset($_SESSION["userLevel"])){
            return $link;
        }
    }
?>