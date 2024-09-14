<?php
    //header, style en functies
    require_once "../../functies/head.php";
    //beveiliging
    UserLevel(2);
    //code
    require_once "../../include/ervaring/create.inc.php";
?>
        <div class="container">
            <div class="brand-logo"></div>
            <div class="brand-title">Ervaringen</div>
            <div class="inputs">

                <!-- formulier -->
                <form method="POST" action="#">
                    <input class="mb-3" type="text" name="bedrijf" placeholder="bedrijf" maxlength="40" value="<?php prev_post("bedrijf") ?>"/>
                    <input class="mb-3" type="text" name="functie" placeholder="functie" maxlength="40" value="<?php prev_post("functie") ?>"/>
                    <input class="mb-3" type="date" name="startdatum"value="<?php prev_post("startdatum") ?>"/>
                    <input class="mb-3" type="date" name="einddatum" value="<?php prev_post("einddatum") ?>"/>
                    <select name="talen" multiple>
                        <?php 
                        //haalt alle talen en hulpmiddelen op.
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