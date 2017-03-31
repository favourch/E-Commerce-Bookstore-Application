


<?php

$page_title = "Register";


#connect to databse
 include 'includes/db.php';

 include 'includes/function.php';


 include 'includes/header.php';



 if(array_key_exists('register', $_POST)){
 		#Cache errors
	 	$errors = [];
	 	#validate first name

	 	if(empty($_POST['fname'])){

	 			$errors['fname'] = "please enter first name";

	 	}

	 	if(empty($_POST['lname'])){

	 			$errors['lname'] = "please enter last name";

	 	}

	 	if(empty($_POST['email'])){

	 			$errors['email'] = "please enter email";

	 	}

	 	if(doesEmailExist($conn, $_POST['email'])){

	 			$errors['email'] = "email already exists";
	 	}


	 	if(empty($_POST['password'])){

	 			$errors['password'] = "please enter password";

	 	}


	 	if($_POST['password'] != $_POST['pword']){

	 			$errors['pword'] = "password do not match";

	 	}

	 	if(empty($errors)){


	 		//acess database
	 		$clean = array_map('trim', $_POST);


	 		#register admin

	 		doAdminRegister($conn, $clean);


	 	}

	 		



 	} 


 	?>





<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
			<?php displayError($errors, 'fname');  ?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
			<?php displayError($errors, 'email');   ?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

	<?php include 'includes/footer.php' ?>