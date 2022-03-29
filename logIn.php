<?php
	//data ophalen
	include_once(__DIR__ . "/classes/User.php");

	//sessie starten
	session_start();
	session_destroy();

	if (!empty($_POST)) {
    	try {
			//er is gepost
        	User::login($_POST['username'], $_POST['password']);
    	} 
		catch (Exception $e) {
			//error
			$error = $e->getMessage();
    	}
	}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Log in</title>
  <link rel="stylesheet" href="./CSS/style.css">    
</head>
<body>
<div id="header">
		<div class="logo"></div>
	</div>
	<div id="main">
		<h1>create More</h1>
        <h3>Log in</h3>
		<div class="loginfb"></div>
		<div class="linel"></div>
		<div class="liner"></div>

		<!-- formulier -->
		<div id="form">
			<form action="" method="post">

				<div class="inputfields">
                    <label for="username">Gebruikersnaam</label>
                    <input name="username" placeholder="Gebruikersnaam" type="text" required/>
                </div>


                <div class="inputfields">
                    <label for="password">Wachtwoord</label>
                    <input name="password" placeholder="Wachtwoord" type="password" required/>
                </div>

				<?php if(isset($error)): ?>
				<div class="errorMessage">
					<p>
						<?php echo $error; ?>
					</p>
				</div>
				<?php endif; ?>


				<div>
				<input type="submit" value="Meld je aan" id="btn">
				</div>

				<p id="hebaccount">Heb je nog geen account?<a href="/signUp.php"> Meld aan</a></p>

			</form>
		</div>
	</div>
</body>
</html>