<?php
  $sTitle = 'Steam Store';
  $sFav = 'img/Untitled.ico'; //icon on tab
  include './temp/header.ini.php';

  $jData = getSteamData($_GET['url_steam']);
?>
	<div style="height:100px"></div>
	<?php if(!empty($jData)) { 
		$rate = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`payrate`');
        $rate = $rate->fetch_assoc();

        //inserting a new steam goods or updating.
        $iID = $jData['ID_gsteam'];
        $result = $mysqli->query("SELECT * FROM gsteam WHERE ID_gsteam = $iID ");
        $row=$result->fetch_assoc();

        //debug jData do not matched with database.
        $sqlData = $jData;
        if(isset($sqlData['apps'])) unset($sqlData['apps']);

        if(empty($row)) {       
            $sInsertSql = buildSQLInsert('gsteam',$sqlData);
            $mysqli->query($sInsertSql);
        }
        else {
            $sEditSql = buildSQLUpdate('gsteam', 'ID_gsteam', "$iID", $sqlData);
            $mysqli->query($sEditSql);
        }
	?>
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				<?php echo '<img src="'.$jData['Pic_gsteam'].'">'; ?>
				<p>
					<?php echo "ประเภทสินค้า : ".$jData['Type_gsteam']; ?>
				</p>
				<p>
					<?php echo "ราคาโอน : ฿".ceil($jData['FinPrice_gsteam']*$rate['Bank_payrate']); ?>
				</p>
				<p>
					<?php echo "ราคาทรู : ฿".ceil($jData['FinPrice_gsteam']*$rate['True_payrate']); ?>
				</p>
				<p>
					<?php if($jData['Dis_gsteam'] > 0) echo "กำลังลดราคา : ".$jData['Dis_gsteam']."%"; ?>
				</p>
				<p>
					<?php echo "วันที่เปิดขาย : ".$jData['Date_gsteam']; ?>
				</p>
			</div>

		</div>

		<div class="row">

			<div class="col-md-6">
				<h2>
					<span class="icon-coin-dollar"style="color:#FFBE00;margin-right:5px; font-size:50px"></span>จ่ายด้วยเงินสด
				</h2>
				<button class="btn btn-primary" type="submit">สินค้าแบบส่ง GIFT</button>
				<button class="btn btn-primary" type="submit">สินค้าในสต็อก (ได้ของทันที!)</button>
			</div>

			<div class="col-md-6">
				<h2>
					<span class="icon-credit-card"style="color:red;margin-right:5px; font-size:50px"></span>จ่ายด้วยเงินสด True money
				</h2>
				<button class="btn btn-primary" type="submit">สินค้าแบบส่ง GIFT</button>
				<button class="btn btn-primary" type="submit">สินค้าในสต็อก (ได้ของทันที!)</button>
			</div>
		</div>

	</div>
<?php } 
	else {
?>
	<h4 align="center" class="white_color">ขออภัยครับไม่พบสินค้าที่ท่านต้องการ</h4>
<?php
	}
 ?>

<?php
include './temp/footer.ini.php';
 ?>

