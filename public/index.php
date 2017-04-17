<?php
require_once("../models/class_user.php");

//$user_login_id = "28";
//$user_name = 'starwars';
//$user_pass = '124';
//$status_content = "This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. ";

//$user_data = $user->get_user_data($user_name);
//$user_friends = $user->get_user_friends($user_data->user_display_name);
//$user_change_pass = $user->set_user_password($user_login_id, 'pas'); // works

//$user_logged_in = $user->check_user_login($user_name, $user_pass);

//$user_status = $user->set_status($user_login_id, $status_content); // works

 /*
    print '<pre>';
    var_dump($name);
    print '</pre>';
    */

/* This logs out user */
// put in a function
session_start();
$_SESSION["login"] = false;
session_destroy();

//require_once("../views/layout.php");
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Index</title>
  <meta name="description" content="Index">
  <meta name="author" content="Joe">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/master.css">

  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>
    <h1 style="text-align:center; margin-top:30vh;">Rella<span class="fa fa-umbrella" style="font-size:40px;"></span></h1>

    <form name="formLogin" class="center" role="form" method="post" action="../controllers/controller_login.php">
        <input type="text"      name="myusername" placeholder="Username"    autocomplete="off"><br>
        <input type="password"  name="mypassword" placeholder="Password" autocomplete="off"><br>
        <input type="submit"    name="Submit"     value="Login">
    </form>

    <!--<a href="../views/register.php">Register</a>-->
<?php
  if(isset($_GET['action'])){
		switch($_GET['action']){
			case 'error':
				echo '<div class="alert alert-danger">
					<strong>Error:</strong> Wrong username or password. Perhaps you have not activated your account.
					</div>';
				break;
			case 'errorEmail':
				echo '<div class="alert alert-danger">
					<strong>Error:</strong> Email failed to send.
					</div>';
				break;
			case 'regSuccess':
				echo '<div class="alert alert-success">
					<strong>Success:</strong> Your account has been added. A comfirmation email has been sent so you can complete the registration.
					</div>';
				break;
			case 'logout':
				echo '<div class="alert alert-info">
					<strong>Logout:</strong> You logged out. Come by again.
					</div>';
				break;
			default:
		}
	}
?>


    <script src="js/scripts.js"></script>
</body>
</html>
