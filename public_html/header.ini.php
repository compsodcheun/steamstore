<!DOCTYPE html>

<?php
  require 'config.php';
  require 'general.php';
  require './con_db.php';
?>

<?php
		if (isset($asJS)) {
			foreach ($asJS as $sFileJSName) {
				echo '<script type="text/javascript" src="'.BASE_URL.'js/'.$sFileJSName.'"></script>';
			}
		}
?>

<html lang="en">
  <head>
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,600&subset=thai' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo "$sTitle"; ?></title>

    <!-- Hover Css -->
    <link href="css/hover.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="shortcut icon" href="img/Untitled.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/icon.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
  </head>
   </head>
  <body background="./img/backg.jpg" style="background-repeat: no-repeat; background-attachment: fixed;">
    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="cus_nav">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php" id="logo_nav"><img src="img/logo.png" id="logo_img"/>SteamStore</a>
        </div>



        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control autosuggest" placeholder="Search" onkeyup="showHint(this.value)" size="30">
              <div class="dropdownSearch">
                <div id="qury">

                </div>
                
              </div>
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </form>




            <ul class="nav navbar-nav pull-right">

            <li>
              <a href="#" ><span class="glyphicon glyphicon-alert" style="color:#FFDD2C"></span> วิธีการสั่งซื้อ </a>
            </li>
  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks" style="color: #3C7DF9;"></span> หมวดหมู่ <strong class="caret"></strong></a>

              <ul class="dropdown-menu">
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire" style="color:#F00"></span> เกมส์ทั้งหมด</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire" style="color:#F00"></span> Hot Sale</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire" style="color:#F00"></span> Steam</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire" style="color:#F00"></span> Steam URL</a>
                    </li> 
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire" style="color:#F00"></span> Steam Wallet</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire" style="color:#F00"></span> Uplay</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire" style="color:#F00"></span> Origin</a>
                    </li>
                   
              </ul>
            </li>

            <?php
                if(isset($_SESSION['login'])) {
                  $iID = $_SESSION['login']['id'];
                  $sType = $_SESSION['login']['type'];
                  $result = $mysqli->query("SELECT * FROM user WHERE Type_user = '$sType' AND ID_user = $iID ");
                  $row=$result->fetch_assoc();
                }
             ?>

            <?php if(isset($_SESSION['login'])){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" style="    color: #A9AFAF;"></span> 
                <?php echo "$row[Name_user] $row[Bal_user] G  $row[True_user] True " ?>  <strong class="caret"></strong></a>

              <ul class="dropdown-menu">
                    <li>
                      <a href="#"><span class="glyphicon glyphicon-off" style="color:#F90E0E"></span> เติมเงิน</a>
                    </li>
                    <li>
                      <a href="#"><span class="glyphicon glyphicon-off" style="color:#F90E0E"></span> ประวัติการซื้อเกมส์</a>
                    </li>
                    <li>
                      <a href="#"><span class="glyphicon glyphicon-off" style="color:#F90E0E"></span> ประวัติการเติมเงิน</a>
                    </li>
                     <li>
                      <a href="#"><span class="glyphicon glyphicon-off" style="color:#F90E0E"></span> แจ้งโอนเงิน</a>
                    </li>
                    <li data-toggle="modal" data-target=".logout">
                      <a href="index.php?role=logout"><span class="glyphicon glyphicon-briefcase" style="color:#51A9DE"></span> ออกจากระบบ</a>
                    </li>
              </ul>
            </li>
            <?php } else { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" style="    color: #A9AFAF;"></span> บัญชีผู้ใช้งาน  <strong class="caret"></strong></a>

              <ul class="dropdown-menu">
                    <li data-toggle="modal" data-target=".login">
                      <a href="#"><span class="glyphicon glyphicon-off" style="color:#F90E0E"></span> เข้าสู่ระบบ</a>
                    </li>
                    <li data-toggle="modal" data-target=".reg">
                      <a href="#"><span class="glyphicon glyphicon-briefcase" style="color:#51A9DE"></span> สมัครสมาชิก</a>
                    </li>
              </ul>
            </li>
            <?php } ?>
          </ul>

        </div>
      </div>
     </nav>

    <div style="width: 100px;"></div>
</body>