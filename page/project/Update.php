<?php
    //header, style en functies
    require_once "../../functies/head.php";
    //beveiliging
    UserLevel(2);
    //code
    require_once "../../include/project/update.inc.php";
?>
        <div class="container">
            <div class="brand-logo"></div>
            <div class="brand-title">Projecten</div>
            <div class="inputs">

                <!-- formulier -->
                <form method="POST" action="#">
                    <input class="mb-3" type="text" name="naam" placeholder="naam" maxlength="40" value="<?php echo $naam; ?>"/>
                    <input class="mb-3" type="text" name="jaar" placeholder="jaar" maxlength="40" value="<?php echo $jaar; ?>"/>
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