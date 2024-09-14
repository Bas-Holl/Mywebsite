    <div class="container" style="width:50%">
        <?php
            //navigatiebalk, style en functies
            require_once "../../functies/navbar.php";
            //beveiling
            UserLevel(2);
        ?>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <!-- begin van taal tabel -->
            <thead class="thead-dark">
                <tr>
                    <th>Taal</th>
                    <th>        
                        <form method="POST" action="create.php">
                            <button class='button-add' type="submit">Toevoegen</button>
                        </form> 
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //zoekt alle talen op
                $query = db()->prepare("SELECT * FROM talen WHERE TaalHulpmiddel = 0");
                $query->execute();
                
                while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                    $id=$result['ID'];
                    ?>
                    <tr>
                        <td><?php echo $result['Naam'] ?></td>
                        <td width=200px;>                    
                            <form method='POST' action='update.php'>
                                <input type = 'hidden' name = 'aanpassen' value = "<?php echo $id ?>" />
                                <button  type='submit'>Aanpassen</button>
                            </form> 
                        </td>
                        <td>
                            <form method='POST' action='delete.php'>
                                <input  class='button-delete' type = 'hidden' name = 'verwijderen' value = "<?php echo $id ?>" />
                                <button  class='button-delete' type='submit'>✕</button>
                            </form> 
                        </td>
                    </tr>
                <?php }?>
                    <!-- Begin van hulpmiddel tabel -->
                    <thead class="thead-dark">
                        <tr>
                            <th>Hulpmiddel</th>
                            <th>        
                                <form method="POST" action="create.php">
                                    <button class='button-add' type="submit">Toevoegen</button>
                                </form> 
                            </th>
                        </tr>
                    </thead>
                <tbody>
                <?php 
                    //zoekt alle hulpmiddelen op
                    $queryhulp = db()->prepare("SELECT * FROM talen WHERE TaalHulpmiddel = 1");
                    $queryhulp->execute();

                    while ($result = $queryhulp->fetch(PDO::FETCH_ASSOC)) {
                        $id=$result['ID'];
                        ?>
                        <tr>
                            <td><?php echo $result['Naam'] ?></td>
                            <td width=200px;>                    
                                <form method='POST' action='update.php'>
                                    <input type = 'hidden' name = 'aanpassen' value = "<?php echo $id ?>" />
                                    <button  type='submit'>Aanpassen</button>
                                </form> 
                            </td>
                            <td>
                                <form method='POST' action='delete.php'>
                                    <input  class='button-delete' type = 'hidden' name = 'verwijderen' value = "<?php echo $id ?>" />
                                    <button  class='button-delete' type='submit'>✕</button>
                                </form> 
                            </td>
                        </tr>
                    <?php }
                    //alles in 1 taal
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>