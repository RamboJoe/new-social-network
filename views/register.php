<?php
require_once("../models/class_user.php");

// This logs out user
session_start();
$_SESSION["login"] = false;
session_destroy();

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


  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

    <style>
        html, body {
            background-color: #F66763;
            /* FB7B70 */
            color: #fff;
            font-size: 15px;
            font-family: 'Lato', sans-serif;
            font-weight: bold;
        }


        input {
            font-size: 18px;
            font-family: 'Lato', sans-serif;
            font-weight: bold;

            background-color: #fed1cd;
            color: #FB7B70;
        }


        input[type=text], input[type=password] {
            background-color: #fed1cd;
            color: #FB7B70;
            border: none;
            padding: 8px 8px;
            margin:5px 0;
            outline: none;

            text-align: center;
        }
        input[type=text]:focus, input[type=password]:focus {
            background-color: #fff;
        }
        input[type=text]::-webkit-input-placeholder, input[type=password]::-webkit-input-placeholder {
            color: #fca49c;
        }


        input[type=submit] {
            border: none;

            padding: 8px 32px;
            margin: 4px 2px;

            text-decoration: none;
            cursor: pointer;
        }
        input[type=submit]:hover{
            background-color: #fca49c;
            color:#fff;
        }


        .center {
            width: 100%;
            margin: 0 auto;
        }

        form {
            display: inline-block;
            text-align: center;
        }

    </style>
</head>

<body>
    <h1 style="text-align:center;">Rella<span class="fa fa-umbrella" style="font-size:40px;"></span></h1>
    <!--
    <form class="center">
        <input type="text" autocomplete="off" placeholder="Username"><br>
        <input type="password" placeholder="Password"><br>
        <input type="submit" value="Login">
    </form>
    -->
    <h1 style="text-align:center;">Register</h1>
    <form name="formRegister" class="center" role="form" method="post" action="../controllers/controller_register.php">
        <input type="text"      name="myusername" placeholder="Username"    autocomplete="off"><br>
        <input type="text"      name="myemail" placeholder="Email"    autocomplete="off"><br>
        <input type="password"  name="mypassword" placeholder="Password" autocomplete="off"><br>
        <input type="submit"    name="Submit"     value="Sign Up">
    </form>

    <a href="../public/index.php">login</a>
<?php
    if(isset($_GET['action'])){
		switch($_GET['action']){
			case 'error':
				echo '<div class="alert alert-danger">
					<strong>Error:</strong> Failed to create user.
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
