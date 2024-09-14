<div class="container"  style="width:50%">  
    <?php
		//Oproepen van de navigatie
        require_once "../../functies/navbar.php";
		//code
        require_once "../../include/login/login.inc.php";
    ?>
	<div class="container">  
		<div class="brand-logo"></div>
		<div class="brand-title">Login</div>
		<form method="POST" action="#">
			<div class="row justify-content-center">

				<label>E-mail</label>
				<!-- prev_post roept op de vorig gestuurde gegevens -->
				<input type="email" name="email" placeholder="Email" value="<?php prev_post("email") ?>"/>

				<label>Wachtwoord</label>
				<input type="password" name="password" placeholder="Typ hier uw wachtwoord" value="<?php prev_post("password") ?>"/>
						
				<div class="form-group col-md-12">
					<button type="submit" name="registratie">login</button>
				</div>
				<div style = "text-align:center">
				<?php echo "<p style='color:red;'>".$message."</p>"; ?>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>