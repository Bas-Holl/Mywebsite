<!-- formulier om talen en hulpmiddelen toe te voegen aan ervaringen -->
<form method="POST" action="#">
    <select name="ervaring">
        <?php 
            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                $id=$result['ID'];
                $naam = $result['Bedrijf'];
                $functie = $result['Functie'];
                echo "<option value=$id>$naam $functie</option>";
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