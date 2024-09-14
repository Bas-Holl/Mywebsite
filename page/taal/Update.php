        <?php
            //header, style en functies
            require_once "../../functies/head.php";
            //beveiliging
            UserLevel(2);
            //code
            require_once "../../include/taal/update.inc.php";
        ?>
        <div class="container">
            <div class="brand-logo"></div>
            <div class="brand-title">Talen</div>

            <!-- update formulier -->
            <form method="POST" action="#">
                <input class="mb-3" type="text" name="naam" value="<?php echo $naam; ?>"/>
                </br>
                <input type="hidden" value="<?php echo $id ?>" name="aanpassen" maxlength="40"/>
                <select class="mb-3" name='taalhulpmiddel'>
                    <option value="0">Taal</option>
                    <option value="1">Hulpmiddel</option>
                </select>
                <input name="id" type ="hidden" value ="<?php echo $id ?>"/>
                <button class="mb-3" type="submit" name="pasaan" value="">Pas aan</button>
            </form>
            
            <!-- terug -->
            <form method="POST" action="read.php">
                <button  type="submit">Overzicht</button>
                <!-- error bericht -->
                <?php echo "<p style='color:red;'>".$message."</p>"; ?>
            </form>
        </div>
    </body>
</html>