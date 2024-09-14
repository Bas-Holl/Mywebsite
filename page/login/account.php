<!-- container zorgt er voor dat alles in een bepaalde ruimte blijft op de site -->
<div class="container" style="width:50%">

    <?php
        //Oproepen van de navigatie
        require_once "../../functies/navbar.php";
        //beveiliging
        UserLevel("1");

        // Oproepen van de PHP code
        require_once "../../include/login/account.inc.php";

        // het aangeven van welke userlevels er op deze pagina toegestaan zijn
        if($_SESSION['UserLevel'] = 0){
            header("Location: index.php");
            exit();
        }
    ?>

    <!-- container zorgt er voor dat alles in een bepaalde ruimte blijft op de site -->
    <div class="container">
    <h5>Uw gegevens</h5>
            <?php
            foreach($result as &$data){       
            $Naam = $data['Gebruikersnaam'];   
            $Email = $data['Email'];
            ?>
                <p>Naam: <?php echo $Naam ?></p> 
                <p>Email: <?php echo $Email ?></p>  
            <?php } ?>
    </div>
    <!-- einde container -->
    <!-- container zorgt er voor dat alles in een bepaalde ruimte blijft op de site -->
    <div class="container">
        <h5>Vul hier onder uw nieuwe gegevens in</h5>
        <form method='post'>
            <input type='text' name='gebruiker'placeholder='Gebruiker' maxlength="30" value="<?php echo $Naam; ?>"/>
            <input type='email' name='email'placeholder='Email'maxlength="40" value="<?php echo $Email; ?>"/>
            <input type='password' name='password' placeholder='Typ hier uw wachtwoord'/>
            <input type='password' name='password2' placeholder='Herhaal uw wachtwoord'/>
            <button type='submit'>verander</button>
        </form>
        <form method='POST' action='#'>
            <button type='submit' name='verwijder'>verwijder account</button>
        </form>
        <?php echo "<p style='color:red;'>".$message."</p>"; ?>
    </div>
</div>
<!-- einde container -->