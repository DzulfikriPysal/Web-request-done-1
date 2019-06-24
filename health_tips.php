<?php
session_start();
?>


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
<?php
if ( isset( $_SESSION['user_id'] ) ) {
	if( $_SESSION['start'] == "1" ){
		$asd = "Welcome " . $_SESSION['name'];
?>
            <script type="text/javascript">
            //alertify.alert("<?php echo $asd; ?>");
			alertify.set('notifier','position', 'top-center');
			alertify.success("<?php echo $asd; ?>");
            </script>
<?php
        
		
		$_SESSION['start'] = "0";
	}
} else {
    header("Location: index.html");
}
?>
	<ul id="dropdown1" class="dropdown-content" style="min-width:140px;">
		<?php
			if($_SESSION['gender'] == 0){
				?>
					<li><img style="border-radius: 50%; width:100px;margin-left:5px; margin-right:5px;" src="image/profile_img/default1.png"></li>
				<?php
			}
			else{
				?>
					<li><img style="border-radius: 50%; width:100px;margin-left:5px; margin-right:5px;" src="image/profile_img/default2.png"></li>
				<?php
			}
		
		?>
		
		<li><a href="" style="pointer-events: none; cursor: default;"><?php echo $_SESSION['name'];?></a></li>
		<li><a href="staff_index.php">Home</a></li>
		<li class="divider"></li>
		<li><a href="staff_profile.php">Profile</a></li>
		<li class="divider"></li>
		<li><a href="health_tips.php">Health Tips</a></li>
		<li class="divider"></li>
		<li><a href="logout.php">Log out</a></li>
	</ul>

	<nav class="blue-grey darken-4">
    <div class="nav-wrapper">
		<a href="staff_index.php" class="brand-logo" style="margin-left:30px;">Google Fit</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down" style="margin-right:30px;">
			<li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Menu<i class="material-icons right">arrow_drop_down</i></a></li>
		</ul>
    </div>
	</nav>

	<ul class="sidenav" id="mobile-demo" style="margin-top:20px;">
		<?php
			if($_SESSION['gender'] == 0){
				?>
					<li><img style="border-radius: 50%; width:100px;margin-left:80px; margin-right:5px; margin-top:50px;" src="image/profile_img/default1.png"></li>
				<?php
			}
			else{
				?>
					<li><img style="border-radius: 50%; width:100px;margin-left:80px; margin-right:5px; margin-top:50px;" src="image/profile_img/default2.png"></li>
				<?php
			}
		
		?>
		<li><a href="" style="pointer-events: none; cursor: default;"><?php echo $_SESSION['name'];?></a></li>
		<li><a href="staff_index.php">Home</a></li>
		<li class="divider"></li>
		<li><a href="staff_profile.php">Profile</a></li>
		<li class="divider"></li>
		<li><a href="health_tips.php">Health Tips</a></li>
		<li class="divider"></li>
		<li><a href="logout.php">Log out</a></li>
		<li class="divider"></li>
	</ul>

<div class="container" style="margin-top:50px;">
	<div class="card-panel grey lighten-2 z-depth-5">
		<div class="row">
			<div>
				<img class="s9" src="image/logo.jpg" alt="logo" style="display: block; margin-left: auto;margin-right: auto;width: 50%; border-radius: 70%;">
			</div>
			<div class="input-field col s8 offset-s1">
				<h4>Health Tips</h4>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. V
					elit sed ullamcorper morbi tincidunt ornare massa eget. Ornare arcu odio ut sem nulla pharetra diam sit amet. Sit amet aliquam 
					id diam maecenas ultricies mi eget. At auctor urna nunc id cursus metus aliquam eleifend. Pharetra pharetra massa massa ultricies mi. 
					Vitae purus faucibus ornare suspendisse sed nisi lacus. In egestas erat imperdiet sed euismod nisi porta lorem. Sed tempus urna et 
					pharetra pharetra. Velit sed ullamcorper morbi tincidunt ornare massa. Pellentesque elit eget gravida cum sociis. Elit eget gravida cum sociis natoque.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. V
					elit sed ullamcorper morbi tincidunt ornare massa eget. Ornare arcu odio ut sem nulla pharetra diam sit amet. Sit amet aliquam 
					id diam maecenas ultricies mi eget. At auctor urna nunc id cursus metus aliquam eleifend. Pharetra pharetra massa massa ultricies mi. 
					Vitae purus faucibus ornare suspendisse sed nisi lacus. In egestas erat imperdiet sed euismod nisi porta lorem. Sed tempus urna et 
					pharetra pharetra. Velit sed ullamcorper morbi tincidunt ornare massa. Pellentesque elit eget gravida cum sociis. Elit eget gravida cum sociis natoque.
				</p>
				
				
			</div>
		 </div>

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
	
	$(".dropdown-trigger").dropdown({
	   coverTrigger: false
	});
	
	$(document).ready(function(){
		$('.parallax').parallax();
	});

	$(document).ready(function(){
		$('.carousel').carousel();
	});
	
	$('.carousel.carousel-slider').carousel({
		fullWidth: true
	});
</script>
</body>
</html>