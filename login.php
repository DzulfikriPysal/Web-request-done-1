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
			<li class="active"><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
    </div>
	</nav>

	<ul class="sidenav" id="mobile-demo">
		<li><a href="index.html">Home</a></li>
		<li class="active"><a href="login.php">Login</a></li>
		<li><a href="register.php">Register</a></li>
	</ul>

<div class="container" style="margin-top:50px;">
<div class="card-panel grey lighten-2 z-depth-5">
	<div class="row">
        <div class="input-field col s8 offset-s1">
			<h4>Login</h4>
        </div>
     </div>

	<form class="col s8" action="" method="post">
		<div class="row">
			<div class="input-field col s8 offset-s1">
				<input id="email" name="email" type="email" class="validate">
				<label for="email">Email</label>
				<span class="helper-text" data-error="wrong" data-success="right">check input</span>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s8 offset-s1">
				<input id="password" name="password" type="password" class="validate">
				<label for="password">Password</label>
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
			$new_password = hash('sha256', $_POST['password']);
			if(!$user){
				?>
					<script type="text/javascript">
					alertify.alert('Fail To Login', 'Email Not Exist');
					</script>
				<?php
			}
			else{
				// Verify user password and set $_SESSION
				if($new_password == $user->password){
				$_SESSION['user_id'] = $user->id;
				$_SESSION['start'] = "1";
				$_SESSION['name'] = $user->firstname;
				$_SESSION['lastname'] = $user->lastname;
				$_SESSION['image'] = $user->profile_img;
				$_SESSION['bg'] = $user->bg;
				$_SESSION['gender'] = $user->gender;
				$_SESSION['bio'] = $user->bio;
				$_SESSION['phone'] = $user->phone;
				$_SESSION['lives'] = $user->lives;
				$_SESSION['studied'] = $user->studied;
				$_SESSION['email'] = $user->email;
				$_SESSION['weight'] = $user->weight;
				$_SESSION['height'] = $user->height;
				$_SESSION['age'] = $user->age;
				$_SESSION['bmi'] = $user->bmi;
				$_SESSION['bmitext'] = $user->bmitext;
				
				$_SESSION['moves_per_minutes'] = $user->moves_per_minutes ;
				$_SESSION['steps'] = $user->steps;
				$_SESSION['cals_burnt'] = $user->cals_burnt;
			
				if($user->user_type == '0'){
					header("Location: admin_index.php");
				}
				else{
					header("Location: staff_index.php");
				}
				}
				else{
					?>
						<script type="text/javascript">
						alertify.alert('Fail to login', 'Wrong Password');
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
</script>
</body>
</html>