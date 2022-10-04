<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../../../includes/connection.php';
include '../../../includes/functions.php';

if (!isset($_SESSION['username']))
{
    header("Location: ../../../login/");
    exit();
}

$username = $_SESSION['username'];

premium_check($username);

($result = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'")) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

$banned = $row['banned'];
if (!is_null($banned))
{
	echo "<meta http-equiv='Refresh' Content='0; url=../../../login/'>";
	session_destroy();
	exit();
}

$role = $row['role'];
$_SESSION['role'] = $role;

$darkmode = $row['darkmode'];
$isadmin = $row['admin'];

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, xtreme admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, material design, material dashboard bootstrap 4 dashboard template">
    <meta name="description" content="Xtreme is powerful and clean admin dashboard template, inpired from Google's Material Design">
    <meta name="robots" content="noindex,nofollow">
    <title>Smartcord - Account Settings</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="300x250" href="https://cdn.discordapp.com/attachments/968121867611299960/996392376065085552/unknown.png">
	<script src="https://cdn.keyauth.uk/dashboard/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Custom CSS -->
	<link href="https://cdn.keyauth.uk/dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="https://cdn.keyauth.uk/dashboard/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.keyauth.uk/dashboard/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="https://cdn.keyauth.uk/dashboard/dist/css/style.min.css" rel="stylesheet">
	

	<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">



	                    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body data-theme="<?php if($darkmode == 0){echo "dark";}else{echo"light";}?>">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin1" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin1">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="https://cdn.discordapp.com/attachments/968121867611299960/996392376065085552/unknown.png" width="48px" height="48px" class="mr-2 hidden md:inline pointer-events-none noselect">
                        </b>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin1">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle waves-effect waves-dark" href="../../../discord/" target="discord"> <i class="mdi mdi-discord font-24"></i>
						</a>
						</li>
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle waves-effect waves-dark" href="../../../telegram/" target="telegram"> <i class="mdi mdi-telegram font-24"></i>
						</a>
						</li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://cdn.discordapp.com/attachments/968121867611299960/996392376065085552/unknown.png" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                                    <div class=""><img src="https://cdn.discordapp.com/attachments/968121867611299960/996392376065085552/unknown.png" alt="user" class="img-circle" width="60"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0"><?php echo $_SESSION['username']; ?></h4>
                                        <p class=" mb-0"><?php echo $_SESSION['email']; ?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="../../account/settings/"><i class="ti-settings mr-1 ml-1"></i> Account Settings</a>
                                <a class="dropdown-item" href="../../account/logout/"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
					<?php sidebar($isadmin); ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Account Settings</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
   
            <!-- ============================================================== -->
            <div class="container-fluid" id="content">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
				<?php
				($result = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."'")) or die(mysqli_error($link));
        if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_array($result))
                {
                    $darkmode = (($row['darkmode'] ? 1 : 0) ? 'Disabled' : 'Enabled');
					
					$expiry = $row["expiry"];
					if(is_null($expiry))
					{
						$expiry = "N/A - not premium";
					}
					else
					{
						$expiry = date('jS F Y h:i:s A (T)', $expiry);
					}
					
					$twofactor = $row["twofactor"];
                }
            }
			
			
				?>
                <!-- ============================================================== -->
                <!-- File export -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form" method="post">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Username</label>
                                        <div class="col-10">
											<label class="form-control"><?php echo $_SESSION['username']; ?></label>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Subscription Expires</label>
                                        <div class="col-10">
											<label class="form-control"><?php echo $expiry; ?></label>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="example-tel-input" class="col-2 col-form-label">Darkmode</label>
                                        <div class="col-10">
                                            <select class="form-control" name="darkmode"><option><?php echo $darkmode; 
                                                    
                                                    if($darkmode == "Enabled")
                                                    {
                                                        echo"<option>Disabled</option>";
                                                    }
                                                    else
                                                    {
                                                        echo"<option>Enabled</option>";
                                                    }
                                                    
                                                    ?></option></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-2 col-form-label">Password</label>
                                        <div class="col-10">
                                            <input class="form-control" type="password" name="pw" placeholder="Enter new password to change to">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="example-password-input" class="col-2 col-form-label">Email</label>
                                        <div class="col-10">
                                            <input class="form-control" name="email" type="email" placeholder="Change email address">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="example-password-input" class="col-2 col-form-label">Username</label>
                                        <div class="col-10">
                                            <input class="form-control" name="username" placeholder="Change username - warning: this will change your verify link">
                                        </div>
                                    </div>
                                    <button name="updatesettings" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>  <?php if($twofactor == 0){echo '<button name="method_2factor" class="btn waves-effect waves-light btn-dark"> <i class="fa fa-lock"></i> Enable 2FA</button>';}else{echo'<button name="method_2factor_disable" class="btn waves-effect waves-light btn-dark"> <i class="fa fa-lock"></i> Disable 2FA</button>';}?>
                                </form>
								<?php

																	require_once '../../../auth/GoogleAuthenticator.php';

                                                                    $gauth = new GoogleAuthenticator();

                                                                    

                                                                    if (isset($_POST['method_2factor']))

                                                                    {

                                                                        $two_fac = true;

                                                                        



                                                                        $code_2factor = $gauth->createSecret();

                                                                        $integrate_code = mysqli_query($link, "UPDATE `users` SET `googleAuthCode` = '$code_2factor' WHERE `username` = '".$_SESSION['username']."'") or die(mysqli_error($link));

                                                                            

                                            

                                                                            $google_QR_Code = $gauth->getQRCodeGoogleUrl($_SESSION['username'], $code_2factor, 'Smartcord');

                                                                            

                                                                            echo '

                                                                            </br>

                                                                            </br>

                                                                            <form method="POST" action="">

                                                                            <div class="row">

                                                                            <div class="form-group">

                                                                            <label>Scan this QR code into your 2FA App.</label>

                                                                            <img src="'.$google_QR_Code.'" />

                                                                            </br>

                                                                            </br>

                                                                            <label>Alternatively, you can set it manually, code: '.$code_2factor.'</label>

                                                                            <input type="text" name="scan_code" id="scan_code" maxlength="6" placeholder="6 Digit Code from 2FA app" class="form-control mb-4" required>

                                                                            <button type="submit" class="btn btn-primary" name="submit_code" id="submit_code">Submit</button>

                                                                            </div>

                                                                            </div>

                                                                            </form>

                                                                            ';                                                                            

                                                                        

                                                                    }
																	
																	
																	
																	if (isset($_POST['method_2factor_disable']))

                                                                    {

                                                                        $two_fac = true;

                                                                            

                                                                            echo '

                                                                            </br>

                                                                            </br>

                                                                            <form method="POST" action="">

                                                                            <div class="row">

                                                                            <div class="form-group">

                                                                            <input type="text" name="scan_code" id="scan_code" maxlength="6" placeholder="6 Digit Code from 2FA app" class="form-control mb-4" required>

                                                                            <button type="submit" class="btn btn-primary" name="submit_code_disable" id="submit_code">Submit</button>

                                                                            </div>

                                                                            </div>

                                                                            </form>

                                                                            ';                                                                            

                                                                        

                                                                    }

                                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Show / hide columns dynamically -->
                
                <!-- Column rendering -->
                
                <!-- Row grouping -->
                
                <!-- Multiple table control element -->
                
				<?php
						
                    if(isset($_POST['updatesettings']))

                    {

                        $pw = sanitize($_POST['pw']);
						
                        $email = sanitize($_POST['email']);
						
                        $username = sanitize($_POST['username']);
						
                        $darkmode = sanitize($_POST['darkmode']);
						
						$darkmode = $darkmode == "Enabled" ? 0 : 1;
						mysqli_query($link, "UPDATE `users` SET `darkmode` = '$darkmode' WHERE `username` = '".$_SESSION['username']."'");
						
                        if(isset($email) && trim($email) != '')

                        {
							($result = mysqli_query($link, "SELECT `email` FROM `users` WHERE `email` = '$email'")) or die(mysqli_error($link));
							if (mysqli_num_rows($result) != 0)
							{
								error("Another account is already using this email!");
								echo "<meta http-equiv='Refresh' Content='2;'>";  
								return;
							}
							
                            mysqli_query($link, "UPDATE `users` SET `email` = '$email' WHERE `username` = '".$_SESSION['username']."'");
							
							if (mysqli_affected_rows($link) != 0)
							{
								// webhook start
								$timestamp = date("c", strtotime("now"));
								
								$json_data = json_encode([
								// Message
								"content" => "" . $_SESSION['username'] . " with email " . $_SESSION['email'] . " has changed email to `{$email}`",
								
								// Username
								"username" => "Smartcord Logs",
								
								], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
								
								$ch = curl_init("discordWebhookHere");
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									'Content-type: application/json'
								));
								curl_setopt($ch, CURLOPT_POST, 1);
								curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
								curl_setopt($ch, CURLOPT_HEADER, 0);
								
								curl_exec($ch);
								curl_close($ch);
								// webhook end
								
								$_SESSION['email'] = $email;
							}

                        }
						
						if(isset($username) && trim($username) != '')

                        {
							
							if($username == $_SESSION['username'])
							{
								error("You already occupy this username!");
								echo "<meta http-equiv='Refresh' Content='2;'>";  
								return;
							}
							
							($result = mysqli_query($link, "SELECT `username` FROM `users` WHERE `username` = '$username'")) or die(mysqli_error($link));
							if (mysqli_num_rows($result) != 0)
							{
								error("Another account is already using this username!");
								echo "<meta http-equiv='Refresh' Content='2;'>";  
								return;
							}

                            mysqli_query($link, "UPDATE `users` SET `username` = '$username' WHERE `username` = '".$_SESSION['username']."'");
                            mysqli_query($link, "UPDATE `servers` SET `owner` = '$username' WHERE `owner` = '".$_SESSION['username']."'");
							
							if (mysqli_affected_rows($link) != 0)
							{
								// webhook start
								$timestamp = date("c", strtotime("now"));
							
								$json_data = json_encode([
								// Message
								"content" => "" . $_SESSION['username'] . " has changed username to `{$username}`",
							
								// Username
								"username" => "Smartcord Logs",
							
								], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
							
								$ch = curl_init("discordWebhookHere");
								curl_setopt($ch, CURLOPT_HTTPHEADER, array(
									'Content-type: application/json'
								));
								curl_setopt($ch, CURLOPT_POST, 1);
								curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
								curl_setopt($ch, CURLOPT_HEADER, 0);
							
								curl_exec($ch);
								curl_close($ch);
								// webhook end
								
								$_SESSION['username'] = $username;
							}

                        }
						
						if(isset($pw) && trim($pw) != '')

                        {

                            $pass_encrypted = password_hash($pw, PASSWORD_BCRYPT);

                            mysqli_query($link, "UPDATE `users` SET `password` = '$pass_encrypted' WHERE `username` = '".$_SESSION['username']."'");

                        }



                                                echo '

                        <script type=\'text/javascript\'>

                        

                        const notyf = new Notyf();

                        notyf

                          .success({

                            message: \'Updated Account Settings!\',

                            duration: 3500,

                            dismissible: true

                          });                

                        

                        </script>

                        ';

                        echo "<meta http-equiv='Refresh' Content='2;'>";  

                    }



                    if (isset($_POST['submit_code']))

                                                                        {

                                                                            if (empty($_POST['scan_code']))

                                                                            {

                                                                                

                                                                                

                                                                                echo '

                                                                                    <script type=\'text/javascript\'>

                                                                                                    

                                                                                    const notyf = new Notyf();

                                                                                    notyf

                                                                                    .error({

                                                                                        message: \'You must fill in all the fields!\',

                                                                                        duration: 3500,

                                                                                        dismissible: true

                                                                                    });                

                                                                                                    

                                                                                </script>

                                                                                ';          

                                            

                                            

                                                                            }

                                                                            

                                                                            $code = $_POST['scan_code'];

                                                                            

                                                                            $user_result = mysqli_query($link, "SELECT * from `users` WHERE `username` = '".$_SESSION['username']."'") or die(mysqli_error($link));

                                                                            while ($row = mysqli_fetch_array($user_result))

                                                                            {

                                                                                $secret_code = $row['googleAuthCode'];

                                                                            }

                                                                            

                                                                            $checkResult = $gauth->verifyCode($secret_code, $code, 2);

                                                                            

                                                                            if ($checkResult)

                                                                            {

                                                                                

                                                                                $enable_2factor = mysqli_query($link, "UPDATE `users` SET `twofactor` = '1' WHERE `username` = '".$_SESSION['username']."'") or die(mysqli_error($link));

                                                                                

                                                                                if ($enable_2factor)

                                                                                {          



                                                                                    echo '

                                                                                        <script type=\'text/javascript\'>

                                                                                                        

                                                                                        const notyf = new Notyf();

                                                                                        notyf

                                                                                        .success({

                                                                                            message: \'Two-factor security has been successfully activated on your account!\',

                                                                                            duration: 3500,

                                                                                            dismissible: true

                                                                                        });                

                                                                                                        

                                                                                    </script>

                                                                                    ';                                                                                          
																					echo "<meta http-equiv='Refresh' Content='2;'>";
                                                                                

                                                                                }

                                                                                else

                                                                                {

                                                                                    

                                                                                    

                                                                                    echo '

                                                                                        <script type=\'text/javascript\'>

                                                                                                        

                                                                                        const notyf = new Notyf();

                                                                                        notyf

                                                                                        .error({

                                                                                            message: \'There was a problem trying to activate security on your account!\',

                                                                                            duration: 3500,

                                                                                            dismissible: true

                                                                                        });                

                                                                                                        

                                                                                    </script>

                                                                                    ';                       

                                                                                    

                                                                                    

                                                                                    

                                                                                                         

                                                                                }

                                                                            }

                                                                            else

                                                                            {

                                                                                

                                                                                echo '

                                                                                    <script type=\'text/javascript\'>

                                                                                                        

                                                                                    const notyf = new Notyf();

                                                                                    notyf

                                                                                    .error({

                                                                                        message: \'The code entered is incorrect\',

                                                                                        duration: 3500,

                                                                                        dismissible: true

                                                                                    });                

                                                                                                        

                                                                                </script>

                                                                                ';                      

                                                                                    

                                                                            }

                                                                            

                                                                        }
																		
																		
																		
																		
																		
																		
																		if (isset($_POST['submit_code_disable']))

                                                                        {

                                                                            if (empty($_POST['scan_code']))

                                                                            {

                                                                                

                                                                                

                                                                                echo '

                                                                                    <script type=\'text/javascript\'>

                                                                                                    

                                                                                    const notyf = new Notyf();

                                                                                    notyf

                                                                                    .error({

                                                                                        message: \'You must fill in all the fields!\',

                                                                                        duration: 3500,

                                                                                        dismissible: true

                                                                                    });                

                                                                                                    

                                                                                </script>

                                                                                ';          

                                            

                                            

                                                                            }

                                                                            

                                                                            $code = $_POST['scan_code'];

                                                                            

                                                                            $user_result = mysqli_query($link, "SELECT * from `users` WHERE `username` = '".$_SESSION['username']."'") or die(mysqli_error($link));

                                                                            while ($row = mysqli_fetch_array($user_result))

                                                                            {

                                                                                $secret_code = $row['googleAuthCode'];

                                                                            }

                                                                            

                                                                            $checkResult = $gauth->verifyCode($secret_code, $code, 2);

                                                                            

                                                                            if ($checkResult)

                                                                            {

                                                                                

                                                                                $enable_2factor = mysqli_query($link, "UPDATE `users` SET `twofactor` = '0' WHERE `username` = '".$_SESSION['username']."'") or die(mysqli_error($link));

                                                                                

                                                                                if ($enable_2factor)

                                                                                {          



                                                                                    echo '

                                                                                        <script type=\'text/javascript\'>

                                                                                                        

                                                                                        const notyf = new Notyf();

                                                                                        notyf

                                                                                        .success({

                                                                                            message: \'Two-factor security has been successfully disabled on your account!\',

                                                                                            duration: 3500,

                                                                                            dismissible: true

                                                                                        });                

                                                                                                        

                                                                                    </script>

                                                                                    ';                                                                                          
																					echo "<meta http-equiv='Refresh' Content='2;'>";	
                                                                                

                                                                                }

                                                                                else

                                                                                {

                                                                                    

                                                                                    

                                                                                    echo '

                                                                                        <script type=\'text/javascript\'>

                                                                                                        

                                                                                        const notyf = new Notyf();

                                                                                        notyf

                                                                                        .error({

                                                                                            message: \'There was a problem trying to activate security on your account!\',

                                                                                            duration: 3500,

                                                                                            dismissible: true

                                                                                        });                

                                                                                                        

                                                                                    </script>

                                                                                    ';                       

                                                                                    

                                                                                    

                                                                                    

                                                                                                         

                                                                                }

                                                                            }

                                                                            else

                                                                            {

                                                                                

                                                                                echo '

                                                                                    <script type=\'text/javascript\'>

                                                                                                        

                                                                                    const notyf = new Notyf();

                                                                                    notyf

                                                                                    .error({

                                                                                        message: \'The code entered is incorrect\',

                                                                                        duration: 3500,

                                                                                        dismissible: true

                                                                                    });                

                                                                                                        

                                                                                </script>

                                                                                ';                      

                                                                                    

                                                                            }

                                                                            

                                                                        }

                    ?>
				
                <!-- DOM / jQuery events -->
                
                <!-- Complex headers with column visibility -->
                
                <!-- language file -->
                
                <!-- Setting defaults -->
                
                <!-- Footer callback -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
       Copyright &copy; <script>document.write(new Date().getFullYear())</script> Smartcord
</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    
   
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="https://cdn.keyauth.uk/dashboard/assets/libs/popper-js/dist/umd/popper.min.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="https://cdn.keyauth.uk/dashboard/dist/js/app.min.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/dist/js/app.init.dark.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="https://cdn.keyauth.uk/dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="https://cdn.keyauth.uk/dashboard/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="https://cdn.keyauth.uk/dashboard/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
   <script src="https://cdn.keyauth.uk/dashboard/dist/js/feather.min.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="https://cdn.keyauth.uk/dashboard/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="https://cdn.keyauth.uk/dashboard/assets/extra-libs/c3/d3.min.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="https://cdn.keyauth.uk/dashboard/assets/libs/chart-js/dist/chart.min.js"></script>
    <script src="https://cdn.keyauth.uk/dashboard/dist/js/pages/dashboards/dashboard1.js"></script>
		<script src="https://cdn.keyauth.uk/dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
	    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdn.keyauth.uk/dashboard/dist/js/pages/datatable/datatable-advanced.init.js"></script>
</body>
</html>