        <?php
            //header, style en functies
            require_once "../../functies/head.php";
            //beveiliging
            UserLevel(2);
            //code
            require_once "../../include/project/upload.inc.php";
        ?>


        <form action="read.php" method="post" enctype="multipart/form-data">
            <!-- error bericht -->
            <?php echo $error; ?>
            <div style="display:flex;">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <select style="width:100%; box-sizing:border-box;" name="project">
                    <?php 
                        $queryupload = db()->prepare("SELECT * FROM projecten ORDER BY Jaar DESC");
                        $queryupload->execute();
                        //loopt door alle projecten
                        while ($resultupload = $queryupload->fetch(PDO::FETCH_ASSOC)) {
                            $id=$resultupload['ID'];
                            $naam = $resultupload['Naam'];
                            echo "<option value=$id>$naam</option>";
                        } 
                    ?>
                </select>
            </div>
            <button type="submit" value="Upload Image" name="submit">Upload Image</button>
        </form>

    </body>
</html>

