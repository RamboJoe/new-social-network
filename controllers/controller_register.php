<?php



ob_start();

require_once("../models/class_user.php");

if($user->register_user($_POST['myusername'], $_POST['mypassword'], $_POST['myemail'], 'Yes')){ //check if password matches user name in db
	session_start(); // need this to start session
  //echo "<h1 style='color:green; text-align:center;'>Successfully created user.</h1>";
	header("location:../public/index.php?action=regSuccess");

} else { // Display error message otherwise
	//echo '<h1 style='color:green; text-align:center;'>Failed to create user.</h1>';
	header("location:../views/register.php?action=error");
}

//echo "<a href='../views/register.php'>Back to register</a>";

ob_end_flush();
?>
