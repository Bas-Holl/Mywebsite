<td width=200px;>
    <!-- formulier voor aanpssen-->
    <form method='POST' action='update.php'>
        <input type = 'hidden' name = 'aanpassen' value = "<?php echo $id ?>" />
        <button  type='submit'>Aanpassen</button>
    </form> 
    <br>
    <!-- formulier voor verwijderen-->
    <form method='POST' action='delete.php'>
        <input  class='button-delete' type = 'hidden' name = 'verwijderen' value = "<?php echo $id ?>" />
        <button  class='button-delete' type='submit'>✕</button>
    </form> 
</td>