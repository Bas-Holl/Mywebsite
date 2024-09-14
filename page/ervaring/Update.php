<?php
    //header, style en functies
    require_once "../../functies/head.php";
    //beveiliging
    UserLevel(2);
    //code
    require_once "../../include/ervaring/update.inc.php";
?>
        <div class="container">
            <div class="brand-logo"></div>
            <div class="brand-title">Ervaringen</div>
            <div class="inputs">

                <!-- formulier -->
                <form method="POST" action="#">
                    <input class="mb-3" type="text" name="bedrijf" placeholder="bedrijf" maxlength="40" value="<?php echo $bedrijf; ?>"/>
                    <input class="mb-3" type="text" name="functie" placeholder="functie" maxlength="40" value="<?php echo $functie; ?>"/>
                    <input class="mb-3" type="date" name="startdatum" value="<?php echo $startdatum; ?>"/>
                    <input class="mb-3" type="date" name="einddatum" value="<?php echo $einddatum; ?>"/>
                    <input type="hidden" value="<?php echo $id ?>" name="aanpassen" maxlength="40"/>
                    <textarea class="mb-3" type="text" name="beschrijving" placeholder="beschrijving" maxlength="400"><?php echo $beschrijving; ?></textarea>
                    <button class="mb-3" type="submit" name="pasaan" value="">Aanpassen</button>
                </form>
                
                <!-- terug -->
                <form method="POST" action="read.php">
                    <button  type="submit">Overzicht</button> 
                    <!-- error bericht -->
                    <?php echo "<p style='color:red;'>".$message."</p>"; ?>
                </form> 
            </div>
        </div>
    </body>
</html>