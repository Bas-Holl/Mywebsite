    <div class="container" style="width:100%">
        <?php
        //navigatiebalk, style en functies
        require_once "../../functies/navbar.php";
        //code
        require_once "../../include/project/read.inc.php";
        echo "</br>";
        echo "<h3>Projecten</h3>";

        //zoekt alle projecten op
        $query = db()->prepare("SELECT * FROM projecten ORDER BY Jaar DESC");
        $query->execute();
        
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            $id=$result['ID'];
            ?>
            <div class="tablegebruiker">
                <div class="containerheader">
                    <b><?php echo $result['Naam'] ?></b>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div><?php echo $result['Jaar'] ?></div>

                        <div style="background: #399eeb;">
                            <?php echo $result['Beschrijving'] ?>
                        </div>
                        <?php 
                            $i=0;
                            //zoekt op talen
                            $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenprojecten ON tussenprojecten.TaalID = talen.ID  WHERE TaalHulpmiddel = 0 AND ProjectID = $id");
                            $querytalen->execute();
                            while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                                $taalid = $resulttalen['ID'];

                                $i++;
                                //zet de titel naast de eerste
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
                            $i=0;
                            //zoekt op hulpmiddelen
                            $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenprojecten ON tussenprojecten.TaalID = talen.ID  WHERE TaalHulpmiddel = 1 AND ProjectID = $id");
                            $querytalen->execute();
                            while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                                $taalid = $resulttalen['ID'];

                                $i++;
                                //zet de titel naast de eerste
                                if($i==1){
                                    echo "<b>Hulpmiddelen: </b>";
                                } else {
                                    echo ", ";
                                }
                                echo $resulttalen['Naam'];
                            }
                        ?> 
                    </div>
                    <?php 
                    //zoekt op de afbeeldingen
                    $queryafbeeldingen = db()->prepare("SELECT * FROM uploads WHERE ProjectID = $id");
                    $queryafbeeldingen->execute();
                    if($queryafbeeldingen->rowCount() > 0){?>
                    <div class="col-sm">
                        <?php require '../../page/project/carousel.php'; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            </br>
        <?php }?>
    </div>
</body>
</html>