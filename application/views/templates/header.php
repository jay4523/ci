<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="/ci/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/ci/assets/css/custom.css">

        <style>
            body {padding-top:60px;}
        </style>

        <link rel="stylesheet" href="/ci/assets/css/bootstrap-responsive.min.css">
		
        <style>
            .row {padding-bottom:10px;}
            .navbar-text {color:white;}
            .comment {background-color:#eee;padding:2px;}
        </style>

		<title><?php echo $title ?></title>
	</head>
	<body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
         <a class="brand" href="/ci/"> <img src="/ci/assets/img/logo.png" height="25" width="71"></a>
        
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <?php if ($this->tank_auth->is_logged_in()) { ?>
                            <li><a href="/ci/profile/edit">Edit Profile</a></li>
                            <li><a href="/ci/auth/logout">Logout</a></li>
                            <?php } else { ?>
                            <li><a href="/ci/auth/login">Login</a></li>
                            <li><a href="/ci/auth/register/">Register</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

		<div class="container-fluid">