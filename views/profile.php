<?php
session_start();
require_once("../models/class_user.php");

//$user_login_id = "28";
//$user_name = 'starwars';
//$user_pass = '124';
//$status_content = "This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. This is a test. ";

$user_data = $user->get_user_data($_SESSION['username']);

/* Testing */
print '<pre>';
var_dump($user_data);
print '</pre>';

$user_friends = $user->get_user_friends($user_data->user_display_name);
//$user_change_pass = $user->set_user_password($user_login_id, 'pas'); // works

//$user_logged_in = $user->check_user_login($user_name, $user_pass);

//$user_status = $user->set_status($user_login_id, $status_content); // works

 /*
    print '<pre>';
    var_dump($name);
    print '</pre>';
    */

$user->isloggedin($_SESSION['username']);

?>

<?php
  if(isset($_GET['uid'])){
		$user_data = $user->get_user_data($_GET['uid']);
    $user_friends = $user->get_user_friends($_GET['uid']);
	}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Rella | Profile</title>
  <meta name="description" content="profile">
  <meta name="author" content="Joe">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

    <style>
        html, body {
            background-color: #fed1cd;
            /* rgb(247, 239, 210) */

            color: #fff;
            font-size: 16px;
            font-family: 'Lato', sans-serif;
            font-weight: bold;

            width: 100%;
            margin: 0 auto;
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

        nav {
            background-color: #FB7B70;
            color:red;
        }

        a:link {color: #fff; text-decoration: none}
        a:visited{color: #fff; text-decoration: none}
        a:hover{color: #FB7B70;}


    </style>
</head>

<body>
    <nav class="center">
        <span class="fa fa-umbrella" style="font-size:28px;"></span>
        <a href="profile.php"><span class="fa fa-user"></span> <?php echo $user->get_user_data($_SESSION['username'])->user_display_name; ?></a>
        <a href="userlist.php"><span class="fa fa-users"></span> Users</a>
        <a href=""><span class="fa fa-cog"></span> settings</a>
        <a href="../public/index.php?action=logout" class="btn" role="button"><span class="fa fa-sign-out"></span> Logout</a>
    </nav>

    <section style="margin:auto; max-width:900px;">
        <p><?php echo $user_data->user_display_name; ?>'s Profile</p>

        <img src="profile1.jpg" style="max-width:20%; border-radius: 100%;">

        <p>Email: <?php echo $user_data->user_email; ?></p>

        <p>Friends:<span style="border-radius: 25%; background:red; padding:4px 8px">?</span> <br>
            <?php
                foreach($user_friends as $friend){
                    echo $friend->FriendB;
                    echo '<br>';
                }
            ?>
        </p>
    </section>



    <script src="js/scripts.js"></script>
</body>
</html>
