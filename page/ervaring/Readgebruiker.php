    <div class="container" style="width:100%">
        <?php
        //navigatiebalk en functies
        require_once "../../functies/navbar.php";
        //code
        require_once "../../include/ervaring/read.inc.php";
        echo "</br>";
        echo "<h3>Ervaringen</h3>";

        //zoekt alle ervaringen op
        $query = db()->prepare("SELECT * FROM ervaringen ORDER BY StartDatum DESC");
        $query->execute();
        
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            $id=$result['ID'];
            $startdate=date_create($result['StartDatum'] );
            $enddate=date_create($result['EindDatum'] );
            ?>
            <div class="tablegebruiker">
                <div class="containerheader">
                    <b><?php echo $result['Bedrijf'] ?></b>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div><?php echo $result['Functie'] ?></div>
                    </div>
                    <div class="col-sm">
                        <?php echo "Begonnen op ".date_format($startdate,"d/m/Y")."<br>tot "?>
                        <!-- kijkt na of er een eind datum is. -->
                        <?php echo ($result['EindDatum']!='0000-00-00')?"en met ".date_format($enddate,"d/m/Y"):"heden." ?>
                    </div>
                </div>
                <div style="background: #399eeb;">
                    <?php echo $result['Beschrijving'] ?>
                </div>


                <?php
                    //hulpmiddelen
                    $i=0;
                    $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenervaring ON tussenervaring.TaalID = talen.ID  WHERE TaalHulpmiddel = 0 AND ErvaringID = $id");
                    $querytalen->execute();
                    while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                        $taalid = $resulttalen['ID'];

                        $i++;
                        if($i==1){
                            echo "<b>Talen: </b>";                            
                        } else {
                            echo ", ";
                        }
                        echo $resulttalen['Naam'];
                    }
                ?> 
                </br>
                <?php 
                    //talen
                    $i=0;
                    $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenervaring ON tussenervaring.TaalID = talen.ID  WHERE TaalHulpmiddel = 1 AND ErvaringID = $id");
                    $querytalen->execute();
                    while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                        $taalid = $resulttalen['ID'];

                        $i++;
                        if($i==1){
                            echo "<b>Hulpmiddelen: </b>";
                        } else {
                            echo ", ";
                        }
                        echo $resulttalen['Naam'];
                    }
                ?> 

            </div>
            </br>
        <?php }?>
    </div>
</body>
</html>