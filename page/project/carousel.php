<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<div id="carousel<?php echo $id?>" class="carousel slide">
  <div class="carousel-inner">
    <?php
    $queryafbeeldingen = db()->prepare("SELECT * FROM uploads WHERE ProjectID = $id");
    $queryafbeeldingen->execute();
    
    //de afbeeldingen worden in een while gezet en alleen de eerste is active
    $i = 0;
    while ($resultafbeeldingen = $queryafbeeldingen->fetch(PDO::FETCH_ASSOC)) {
      $i++;
      ?><div style="height: 200px; width: 425px;" class="carousel-item <?php if ($i==1)echo "active"?>">
        <a href="uploads/<?php echo $resultafbeeldingen['Afbeelding'];?>" target="_blank">
          <img style="" src='uploads/<?php echo $resultafbeeldingen['Afbeelding'];?>' class="h-100 img-fluid" alt='<?php echo $resultafbeeldingen['Afbeelding'];?>'>
        </a>
      </div>
    <?php } ?>
  </div>
  <!-- knoppen verschijnen alleen als er afbeeldingen zijn -->
  <?php if($queryafbeeldingen->rowCount() > 0){?>
    <!-- vorige knop -->
    <button class="ignore-css carousel-control-prev middel" type="button" data-bs-target="#carousel<?php echo $id?>" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <!-- volgende knop -->
    <button class="ignore-css carousel-control-next middel" style="right: 0px;" type="button" data-bs-target="#carousel<?php echo $id?>" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  <?php } ?>
</div>