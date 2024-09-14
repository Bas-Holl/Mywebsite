    <div class="containerlarge">
        <?php
            //navigatie, style en functies
            require_once "../../functies/navbar.php";
            //beveiliging
            UserLevel(2);
            //code
            require_once "../../include/project/read.inc.php";
            echo "</br>";

            

            //koppel tabel formulier
            require_once '../../page/project/Connect.php';
            //afbeelding upload ding
            require_once '../../page/project/upload.php';
        ?>
        <table class="table table-striped table-bordered" style="width:100%">
            <!-- begin van taal tabel -->
            <thead class="thead-dark">
                <tr>
                    <th>Naam</th>
                    <th>Hulpmiddelen</th>
                    <th>Talen</th>
                    <th>Beschrijving</th>
                    <th>Plaatje</th>
                    <th></th>
                    
                    <!-- toevoegen van een nieuwe regel -->
                    <th>
                        <form method='POST' action='create.php'>
                            <button class='button-add' type='submit'>Toevoegen</button>
                        </form> 
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //zoekt alle projectenen op
                while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                    $id=$result['ID'];
                    ?>
                    <tr>
                        <td><?php echo $result['Naam'] ?></br></br><b>Jaren</b></br><?php echo $result['Jaar'] ?></td>

                        <!-- Hulpmiddelen -->
                        <td style="white-space: nowrap;">
                            <?php 
                                $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenprojecten ON tussenProjecten.TaalID = talen.ID  WHERE TaalHulpmiddel = 1 AND ProjectID = $id");
                                $querytalen->execute();
                                while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                                    $taalid = $resulttalen['ID'];

                                    echo $resulttalen['Naam'];
                                    ?>
                                        <form method='post' action='#' class='inline'>
                                            <input type='hidden' name='tussenid'  value=$taalid>  
                                            <button class='deletesmall' name='deletetaal' type='submit'>X</button>
                                        </form>
                                    <?php
                                }
                            ?>
                        </td>
                        
                        <!-- talen -->
                        <td>
                            <?php 
                                $querytalen = db()->prepare("SELECT * FROM talen LEFT JOIN tussenprojecten ON tussenProjecten.TaalID = talen.ID  WHERE TaalHulpmiddel = 0 AND ProjectID = $id");
                                $querytalen->execute();
                                while ($resulttalen = $querytalen->fetch(PDO::FETCH_ASSOC)) {
                                    $taalid = $resulttalen['ID'];
                                    echo $resulttalen['Naam'];
                                    ?>
                                        <form method='post' action='#' class='inline'>
                                            <input type='hidden' name='tussenid'  value=$taalid>  
                                            <button class='deletesmall' name='deletetaal' type='submit'>X</button>
                                        </form>
                                    <?php
                                }
                            ?>
                        </td>
                        <!--beschrijving-->
                        <td><?php echo $result['Beschrijving'] ?></td>
                        
                        <!--afbeeldingen-->
                        <td>
                            <?php 
                                $queryafbeeldingen = db()->prepare("SELECT Afbeelding, uploads.ID AS uploadID FROM uploads LEFT JOIN projecten ON projecten.ID = uploads.ProjectID  WHERE ProjectID = $id");
                                $queryafbeeldingen->execute();
                                while ($resultafbeeldingen = $queryafbeeldingen->fetch(PDO::FETCH_ASSOC)) { 
                                    $afbeeldingid = $resultafbeeldingen['uploadID'];
                                    $afbeeldingnaam = $resultafbeeldingen['Afbeelding'];
                                    echo "<img src='uploads/".$resultafbeeldingen['Afbeelding']."' class='h-100 img-fluid' alt='".$resultafbeeldingen['Afbeelding']."'>";
                                    ?>
                                        <form method='post' action='#' class='inline'>
                                            <input type='hidden' name='projectid'  value=<?php echo $afbeeldingid; ?>>
                                            <input type='hidden' name='afbeeldingnaam'  value=<?php echo $afbeeldingnaam; ?>>
                                            <button class='deletesmall' name='deleteafbeelding' type='submit'>X</button>
                                        </form>
                                    <?php
                                }
                            ?>
                        </td>

                        <!-- carousel met de zelfde afbeeldingen -->
                        <td><?php 
                            require '../../page/project/carousel.php';
                        ?></td>

                        <!-- de knoppen voor aanpassen en verwijderen -->
                        <?php
                            require '../../page/project/ReadForm.php';
                        ?>
                    </tr>
                <?php }?>
        </table>
        <!-- eind van tabel -->
    </div>
</body>
</html>