<div class="container"  style="width:50%">  
    <?php
        //navigatiebalk, functies en style
        require_once "../../functies/navbar.php";
        //code
        require_once "../../include/login/registratie.inc.php";
    ?>
    <div class="container">  
    <div class="brand-logo"></div>
    <div class="brand-title">registreren</div>
    <!-- formulier -->
    <form method="POST" action="#">
        <div class="row justify-content-center">
            <label>Gebruikersnaam</label>
            <input id="name"name="name" placeholder="Gebruikersnaam" maxlength="30" value="<?php prev_post("name") ?>"/>

            <label>E-mail</label>
            <input type="email" name="email" placeholder="Email" maxlength="40" value="<?php prev_post("email") ?>"/>

            <label>Wachtwoord</label>
            <input type="password" name="password" placeholder="Typ hier uw wachtwoord" value="<?php prev_post("password") ?>"/>

            <label>Herhaal wachtwoord</label>
            <input type="password" name="password2" placeholder="herhaal wachtwoord" value="<?php prev_post("password2") ?>"/>
                    
            <div class="form-group col-md-12">
                <button type="submit" name="registratie">registreren</button>
            </div>
            <div style = "text-align:center">
                <?php echo "<p style='color:red;'>".$message."</p>"; ?>
            </div>
        </div>
    </form>
</div>
</body>
</html>