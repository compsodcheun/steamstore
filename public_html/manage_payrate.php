<!DOCTYPE html>

<?php
  $sTitle = 'Steam Store';
  $sFav = './img/Untitled.ico'; //icon on tab
  include './temp/header.ini.php'; 
?>  

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SteamStore</title>

    <!-- Bootstrap -->
    <link rel="shortcut icon" href="img/Untitled.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
              <input type="text" class="form-control" placeholder="Search" size="30">
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </form>




            <ul class="nav navbar-nav pull-right">

            <li>
              <a href="#" ><span class="glyphicon glyphicon-alert"></span> วิธีการสั่งซื้อ </a>
            </li>
  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span> หมวดหมู่ <strong class="caret"></strong></a>

              <ul class="dropdown-menu">
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire"></span> เกมส์ทั้งหมด</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire"></span> Hot Sale</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire"></span> Uplay</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire"></span> Origin</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire"></span> Steam</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-fire"></span> Steam Wallet</a>
                    </li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> บัญชีผู้ใช้งาน  <strong class="caret"></strong></a>

              <ul class="dropdown-menu">
                    <li>
                      <a href=""><span class="glyphicon glyphicon-off"></span> Login</a>
                    </li>
                    <li>
                      <a href=""><span class="glyphicon glyphicon-briefcase"></span> Register</a>
                    </li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
     </nav>

    <div class="container" style="margin-top: 100px; ">

<?php
	if(isset($_POST['submit_edit'])) {
		$axUpdate = array(
			'Bank_payrate' =>"$_POST[Bank_payrate]"
			,'True_payrate' =>"$_POST[True_payrate]");
		$sEditSql = buildSQLUpdate('payrate', 'ID_payrate', 1, $axUpdate);
		if($mysqli->query($sEditSql)) echo '<span style="color : green;">ทำการอัพเดทอัตราราคาเรียบร้อยแล้ว</span>';
		?>
		<script type="text/javascript">window.setTimeout('window.location="<?php echo $_SERVER['PHP_SELF']; ?>"; ',1000);</script>
		<?php
	}

	echo '<form name="page" method="post" action="'.$_SERVER['PHP_SELF'].'">';
	if($result=$mysqli->query('SELECT * FROM `'.DB_NAME.'`.`payrate`')){
          $row=$result->fetch_assoc();
          echo '<label>อัตราโอน (เช่น 0.95)</label>
          <input class="form-control" min="0"step="0.01" type="number" name="Bank_payrate" value='.$row['Bank_payrate'].'><br>';
          echo '<label>อัตราทรู (เช่น 1.1)</label>
          <input class="form-control" min="0"step="0.01" type="number" name="True_payrate" value='.$row['True_payrate'].'><br>';
    }
    echo '<input class="form-control" type="submit" name="submit_edit" value="Confirm Edit"><br>'; 
    echo "</form>";
    $mysqli->close();
?>

	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>