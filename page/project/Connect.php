<!-- een formulier dat talen en hulpmiddelen aan een project kan toevoegen. -->
<form method="POST" action="#">
    <select name="project">
        <?php 
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $id=$result['ID'];
                $naam = $result['Naam'];
                echo "<option value=$id>$naam</option>";
            } 
        ?>
    </select>
    <select name="talen">
        <?php 
            while ($resulttaal = $querytaal->fetch(PDO::FETCH_ASSOC)) {
                $id=$resulttaal['ID'];
                $naam = $resulttaal['Naam'];
                echo "<option value=$id>$naam</option>";
            } 
        ?>
    </select>
    <button class="mb-3" type="submit" name="taal">Voeg toe</button>
</form>