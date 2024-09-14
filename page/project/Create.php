<?php
    //header, style en functies
    require_once "../../functies/head.php";
    //beveiliging
    UserLevel(2);
    //code
    require_once "../../include/project/create.inc.php";
?>
        <div class="container">
            <div class="brand-logo"></div>
            <div class="brand-title">Projecten</div>
            <div class="inputs">

                <!-- formulier -->
                <form method="POST" action="#">
                    <input class="mb-3" type="text" name="naam" placeholder="naam" maxlength="40" value="<?php prev_post("naam") ?>"/>
                    <input class="mb-3" type="text" name="jaar" placeholder="jaar" maxlength="40" value="<?php prev_post("jaar") ?>"/>
                    <select name="talen" multiple>
                        <?php 
                            while ($resulttaal = $querytaal->fetch(PDO::FETCH_ASSOC)) {
                                $id=$resulttaal['ID'];
                                $naam = $resulttaal['Naam'];

                                echo "<option value=$id>$naam</option>";
                            }
                        ?>
                    </select>
                    </br></br>
                    <textarea class="mb-3" type="text" name="beschrijving" placeholder="beschrijving" maxlength="400"><?php prev_post("beschrijving") ?></textarea>
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