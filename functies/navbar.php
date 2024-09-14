<?php
  //haalt de header en styling op
  require "head.php";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
  <div class="container-fluid">
    <a class="navbar-brand" style=color:#318CE7; href='../home/home.php'>Bas Holl</a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class='nav-link' href='../home/home.php'>Home</a>
        <?php echo NavUserLevel(2,"<a class='nav-link' href='../ervaring/Read.php'>Ervaring admin</a>"); ?>
        <a class='nav-link' href='../ervaring/Readgebruiker.php'>Ervaringen</a>
        <?php echo NavUserLevel(2,"<a class='nav-link' href='../project/Read.php'>Project admin</a>"); ?>
        <a class='nav-link' href='../project/Readgebruiker.php'>Projecten</a>
        <?php echo NavUserLevel(2,"<a class='nav-link' href='../taal/read.php'>Talen</a>"); ?>
        <?php echo Loggedout("<a class='nav-link' href='../login/registratie.php'>Registreren</a>"); ?>
        <?php echo Loggedout("<a class='nav-link' href='../login/inlog.php'>Login</a>"); ?>
        <?php echo NavUserLevel(1,"<a class='nav-link' href='../login/account.php'>Account</a>"); ?>
        <?php echo NavUserLevel(1,"<a class='nav-link' href='../login/loguit.php'>Loguit</a>"); ?>
        <?php echo NavUserLevel(2,"<a class='nav-link' href='../game/game.html'>Game</a>"); ?>
      </div>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

