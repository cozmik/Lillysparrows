<?php 
include '../includes/db-connect.php'; 
include '../includes/functions2.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin | Registration</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>   

     <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
                                    <div class="panel-heading" style="background-color:#2c3e50; color: #fff;">
						<strong>Admin Registration</strong>
					</div>
					<div class="panel-body">
                                            <form class="center" method="POST" role="form">
                                                    <fieldset class="registration-form">
                                                        <div class="form-group">
                                                            <label for="username" class="sr-only">Username: </label>
                                                            <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fname" class="sr-only">First name: </label>
                                                            <input type="text" id="username" name="fname" placeholder="First name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lname" class="sr-only">Last name: </label>
                                                            <input type="text" id="username" name="lname" placeholder="Last name" class="form-control">
                                                        </div>                                                        
                                                        <div class="form-group">
                                                            <label for="email" class="sr-only">Email: </label>
                                                            <input type="email" id="email" name="email" placeholder="someone@domian.com" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="passsword" class="sr-only">Password: </label>
                                                            <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_confirm" class="sr-only">Confirm password: </label>
                                                            <input type="password" id="password_confirm" name="password_confirm" placeholder="Password (Confirm)" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <button name="admin_registration_btn" class="btn btn-default btn-md btn-block">Register</button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            <?php echo $registration_message; ?>
					</div>
                                        <div class="panel-footer ">
                                            <span>For enquiries call: +234701234643</span>
					</div>
                                    
                            </div>
			</div>
		</div>
	</div>
    
    
    
    


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    
    <script>
       $('#fade').fadeOut(8000);
    </script>
    
</body>
</html>