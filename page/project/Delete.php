        <?php
            //header, style en functies
            require_once "../../functies/head.php";
            //beveiliging
            UserLevel(2);
            //code
            require_once "../../include/project/delete.inc.php";
        ?>
        <div class="container">
            <div class="brand-logo"></div>
            <div class="brand-text">Weet u zeker dat u <?php echo $naam; ?> wilt verwijderen uit Projecten</div>
            
            <!-- Formulier -->
            <form method="POST" action="#">
                <input type = 'hidden' name = 'verwijderen' value = <?php echo $id; ?> />
                <button class="mb-3" type="submit" name="delete">Ja</button>
            </form>
            
            <!-- terug -->
            <form method="POST" action="read.php">
                <button type="submit">Nee</button>
            </form> 
        </div>
    </body>
</html>