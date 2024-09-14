    <div class="container" style="width:100%">
        <?php
            //navigatiebalk
            require_once "../../functies/navbar.php";
            //beveiliging
            UserLevel(2);
            //de code
            require_once "../../include/ervaring/read.inc.php";
            echo "</br>";

            //koppel tabel formulier
            if(isset($_SESSION["userLevel"])){
                if($_SESSION["userLevel"]>=2){
                    require_once '../../page/ervaring/Connect.php';
                }
            }
        ?>
        <table class="table table-striped table-bordered" style="width:100%">
            <!-- begin van taal tabel -->
            <thead class="thead-dark">
                <tr>
                    <th>Bedrijf</th>
                    <th>Functie</th>
                    <th>Start datum</th>
                    <th>Eind datum</th>
                    <th>Hulpmiddelen</th>
                    <th>Talen</th>
                    <th>Beschrijving</th>
                    
                    <!-- toevoegen van een nieuwe regel -->
                    <?php echo NavUserLevel(2,"
                        <th>
                            <form method='POST' action='create.php'>
                                <button class='button-add' type='submit'>Toevoegen</button>
                            </form> 
                        </th>
                    "); ?>
                </tr>
            </thead>
            <tbody>
                <?php
                //zoekt alle ervaringen op
                $query = db()->prepare("SELECT * FROM ervaringen ORDER BY StartDatum DESC");
                $query->execute();
                
                while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                    $id=$result['ID'];
                    ?>
                    <tr>
                        <td><?php echo $result['Bedrijf'] ?></td>
                        <td><?php echo $result['Functie'] ?></td>
                        <td><?php echo $result['StartDatum'] ?></td>
                        <td><?php echo $result['EindDatum'] ?></td>

                        <td style="white-space: nowrap;">
                            <?php
                                //leest alle talen van deze ervaring op
                                $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenervaring ON tussenervaring.TaalID = talen.ID  WHERE TaalHulpmiddel = 1 AND ErvaringID = $id");
                                $querytalen->execute();
                                while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                                    $taalid = $resulttalen['ID'];

                                    echo $resulttalen['Naam'];
                                    echo NavUserLevel(2,"
                                        <form method='post' action='#' class='inline'>  
                                            <input type='hidden' name='tussenid'  value=$taalid>
                                            <button class='deletesmall' name='deletetaal' type='submit'>X</button>
                                        </form>
                                    "); 
                                }
                            ?>
                        </td>

                        <td>
                            <?php
                                //leest alle talen van deze ervaring op
                                $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenervaring ON tussenervaring.TaalID = talen.ID  WHERE TaalHulpmiddel = 0 AND ErvaringID = $id");
                                $querytalen->execute();
                                while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                                    $taalid = $resulttalen['ID'];
                                    echo $resulttalen['Naam'];
                                    echo NavUserLevel(2,"
                                        <form method='post' action='#' class='inline'>  
                                            <input type='hidden' name='tussenid'  value=$taalid>
                                            <button class='deletesmall' name='deletetaal' type='submit'>X</button>
                                        </form>
                                    "); 
                                }
                            ?>
                        </td>
                        <td><?php echo $result['Beschrijving'] ?></td>

                        <!-- de knoppen voor aanpassen en verwijderen -->
                        <?php if(isset($_SESSION["userLevel"])){
                            if($_SESSION["userLevel"]>=2){
                                require '../../page/ervaring/ReadForm.php';
                            }
                        } ?>
                    </tr>
                <?php }?>
        </table>
        <!-- eind van tabel -->
    </div>
</body>
</html>