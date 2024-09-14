<?php
    //header, style en functies
    require_once "../../functies/head.php";
    //beveiliging
    UserLevel(2);
    //code
    require_once "../../include/taal/create.inc.php";
?>
        <div class="container">
            <div class="brand-logo"></div>
            <div class="brand-title">Talen</div>
            <div class="inputs">

                <!-- formulier -->
                <form method="POST" action="#">
                    <input class="mb-3" type="text" name="naam" placeholder="naam" maxlength="40" value="<?php prev_post("naam") ?>"/>
                    </br>
                    <select class="mb-3" name='taalhulpmiddel'>
                        <option value="0">Taal</option>
                        <option value="1">Hulpmiddel</option>
                    </select>
                    <button class="mb-3" type="submit" name="toevoeg" value="Voeg toe">Voeg toe</button>
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