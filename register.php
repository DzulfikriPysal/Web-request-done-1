<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<script src="js/alertify.min.js"></script>
	<link rel="stylesheet" href="css/alertify.min.css" />
	<link rel="stylesheet" href="css/themes/default.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<nav class="blue-grey darken-4">
    <div class="nav-wrapper">
		<a href="index.html" class="brand-logo" style="margin-left:30px;">Google Fit</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down" style="margin-right:30px;">
			<li><a href="index.html">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li class="active"><a href="register.php">Register</a></li>
		</ul>
    </div>
	</nav>

	<ul class="sidenav" id="mobile-demo">
		<li><a href="index.html">Home</a></li>
		<li><a href="login.php">Login</a></li>
		<li class="active"><a href="register.php">Register</a></li>
	</ul>

<div class="container" style="margin-top:50px;">
<div class="card-panel grey lighten-2 z-depth-5">
	<div class="row">
        <div class="input-field col s8 offset-s1">
			<h4>Register</h4>
        </div>
     </div>

	<form class="col s8" action="" method="post">
		<div class="row">
			<div class="input-field col s4 offset-s1">
				<input placeholder="Placeholder" id="first_name" name="first_name" type="text" class="validate">
				<label for="first_name">First Name</label>
				<span class="helper-text" data-error="wrong" data-success="right">check input</span>
			</div>
			<div class="input-field col s4">
				<input id="last_name" type="text" name="last_name" class="validate">
				<label for="last_name">Last Name</label>
				<span class="helper-text" data-error="wrong" data-success="right">check input</span>
			</div>
		</div>
		
		<div class="row">
			<div class="input-field col s4 offset-s1">
					<label>Gender</label></br></br>
					  <select class="browser-default" id="gender" name="gender">
						<option value="" disabled selected>Choose your option</option>
						<option value="0">Male</option>
						<option value="1">Female</option>
					  </select>

				  
				
			</div>
			<div class="input-field col s4">
				<input id="phone" type="number" name="phone" class="validate">
				<label for="phone">Phone Number</label>
				<span class="helper-text" data-error="wrong" data-success="right">check input</span>
			</div>
		</div>
		
		
		<div class="row">
			<div class="input-field col s8 offset-s1">
				<input id="email" name="email" type="email" class="validate"></input>
				<label for="email">Email</label>
				<span class="helper-text" data-error="wrong" data-success="right">check input</span>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s8 offset-s1">
				<input id="password" name="password" type="password" class="validate">
				<label for="password">Password</label>
				<span class="helper-text" data-error="wrong" data-success="right">check input</span>
			</div>
		</div>
	  
		<div class="row">
			<div class="input-field col s8 offset-s1">
				<button class="btn waves-effect waves-light" type="submit" name="action" style="margin-top:0px;">Submit
					<i class="material-icons right">send</i>
				</button>
			</div>
		</div>
	  
    </form>	
	
	
	
	<?php
	// Always start this first
	session_start();
	if ( ! empty( $_POST ) ) {
		
		if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
			// Getting submitted user data from database
			
			// Required field names
			$required = array('first_name', 'last_name', 'email', 'password', 'phone');

			// Loop over field names, make sure each one exists and is not empty
			$error = false;
			foreach($required as $field) {
			  if (empty($_POST[$field])) {
				$error = true;
			  }
			}

			if ($error) {
				?>
					<script type="text/javascript">
					alertify.alert('Fail To Register', 'Some of the field required to be fill');
					</script>
				<?php
			} else {
				$db_host = 'localhost';
				$db_user = 'root';
				$db_pass = '';
				$db_name = 'data_1';
				$con = new mysqli($db_host, $db_user, $db_pass, $db_name);
				
				$stmt = $con->prepare("SELECT * FROM user WHERE email = ?");
				$stmt->bind_param('s', $_POST['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$user = $result->fetch_object();
				
				if(!$user){
					$firstname = $_POST['first_name'];
					$lastname = $_POST['last_name'];
					$new_password = hash('sha256', $_POST['password']);
					$email = $_POST['email'];
					$status = "0";
					$user_type = "1";
					
					$lives = "none";
					$studied = "none";
					$phone = $_POST['phone'];
					$gender = $_POST['gender'];
					$profile_img = "default";
					$bg = "default";
					$bio = "none";
					$weight = "0";
					$height = "0";
					$age = "0";
					$bmi = "None";
					$bmitext = "None";
					$moves_per_minutes = rand(60, 80);
					$steps = rand(1000, 3000);
					$cals_burnt = rand(1000, 4000);
					
					$query = "INSERT into `user` (firstname, lastname, password, email, status, user_type, lives, studied, phone, gender, profile_img, bg, bio, age, weight, height, bmi, bmitext, steps, moves_per_minutes, cals_burnt) 
							  VALUES ('$firstname', '$lastname', '$new_password', '$email', '$status', '$user_type' , '$lives', '$studied', '$phone', '$gender', '$profile_img', '$bg', '$bio', '$age', '$weight', '$height', '$bmi', '$bmitext', '$steps', '$moves_per_minutes' , '$cals_burnt')";
					$result = mysqli_query($con,$query);
					?>
						<script type="text/javascript">
						var alertifyObject = alertify.alert('Congratulations', 'Succesfully register to the system');
						alertifyObject.setContent('Succesfully register to the system </br> <a href="login.php">Click here to login page</a>');
						</script>
					<?php
				}
				else{	
					?>
						<script type="text/javascript">
						alertify.alert('Fail To Register', 'Email Exist in the System, go to login page to login');
						</script>
					<?php
					
				}
			}



			
		} 
	}
	
	?>
	
</div>
</div>




<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.sidenav');
		var instances = M.Sidenav.init(elems, options);
	});


	$(document).ready(function(){
		$('.sidenav').sidenav();
	});
	
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('select');
		var instances = M.FormSelect.init(elems, options);
	  });
</script>
</body>
</html>