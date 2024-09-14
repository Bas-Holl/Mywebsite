<!-- knop voor aanpassen -->
<td width=200px;>        
    <form method='POST' action='update.php'>
        <input type = 'hidden' name = 'aanpassen' value = "<?php echo $id ?>" />
        <button  type='submit'>Aanpassen</button>
    </form> 
</td>
<!-- knop voor verwijderen -->
<td style="min-width: 50px">
    <form method='POST' action='delete.php'>
        <input  class='button-delete' type = 'hidden' name = 'verwijderen' value = "<?php echo $id ?>" />
        <button  class='button-delete' type='submit'>✕</button>
    </form> 
</td>