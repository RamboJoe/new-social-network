<?php
ob_start();

require_once("../models/class_user.php");

/*
//$user_login_id = "28";
//$user_name = 'starwars';
//$user_pass = '124';
//$status_content = "This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. ";

//$user_data = $user->get_user_data($_POST['myusername']);
//$user_friends = $user->get_user_friends($user_data->user_display_name);
//$user_change_pass = $user->set_user_password($user_login_id, 'pas'); // works
//$user_logged_in = $user->check_user_login($user_name, $user_pass);

//$user_status = $user->set_status($user_login_id, $status_content); // works
*/
?>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<?php
//require_once(TEMPLATES_PATH . "/nav.php");

if($user->check_user_login($_POST['myusername'], $_POST['mypassword'])){ //check if password matches user name in db
	session_start(); // need this to start session

	// register username and login
	$_SESSION['login'] = '1';
	$_SESSION['username'] = $_POST['myusername'];
    echo "<h1 style='color:green; text-align:center;'>Success</h1>";

	// redirect to file "login_success.php"
	header("location:../views/profile.php");

} else { // Display error message otherwise
	echo "<h1 style='color:red; text-align:center;'>";
	echo "Wrong Username or Password!</h1>";

	echo '<div class="alert alert-danger">
			<strong>Failure:</strong> You have entered in the wrong username or password.</div>';

	header("location:../public/index.php?action=error");


}

echo "<a href='index.php'>Back to login</a>";

ob_end_flush();
?>
