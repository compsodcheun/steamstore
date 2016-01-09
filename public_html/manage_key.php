<?php
	require 'config.php';
	require 'general.php';
	$sTitle = 'จัดการคีย์';
	$sFav = './images/facebook.png'; //icon on tab
	require './temp/header.tpl.html';
	require './con_db.php';
	$limit = 10;
?>

<?php
	//pagination
    if (!isset($_POST['page'])) {
        if(empty($_SESSION['manage_key_page'])) $page = 1;
        else $page = $_SESSION['manage_key_page'];
    } else {
      $page = $_POST['page'];
    }
    $All_page = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`key`');
    $All_page = ceil($All_page->num_rows/$limit); //Page cal
    $first = (($page-1)*$limit); //first
    $per_page = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`key` LIMIT '.$first.', '.$limit.'');
    $per_page = $per_page->num_rows;
    //echo "$per_page";

	if(isset($_GET['act'])) $sAct = $_GET['act'];
	else $sAct = '';

	if(isset($_POST['cancel'])) $sAct = '';

	//ทำการเพิ่ม
	if(isset($_POST['submit_add'])) {
		$axInsert = array(
			'ID_key' => "$_POST[new_ID_key]"
			,'Code_key' =>"$_POST[new_Code_key]"
			,'Status_key' =>"$_POST[new_Status_key]"
			,'ID_goods' =>"$_POST[new_ID_goods]");
		$sInsertSql = buildSQLInsert('key',$axInsert);
		if($mysqli->query($sInsertSql)) echo "";
		if($per_page == $limit) {
    	$next_page = $page+1;
    	echo '<form name="page" method="post" action="'.$_SERVER['PHP_SELF'].'">'
			,'<input type="hidden" name="page" value="'.$next_page.'">'
			,'<script language="JavaScript">document.page.submit();</script></form>';
   		}

   		if($per_page == 0 and $page == 1) {
   			echo '<script type="text/javascript">window.setTimeout(window.location="'.$_SERVER['PHP_SELF'].'",0);</script>';
   		}
	}

	//ทำการลบากฐานข้อมูล
	if(isset($_POST['submit_del'])) {
		$sDelSql = buildSQLDelete('key', 'ID_key', "$_POST[ID_key]");
		if($mysqli->query($sDelSql)) echo "";
		 if($per_page == 1 and $page != 1) {
	    	$pre_page = $page-1;
	    	echo '<form name="page" method="post" action="'.$_SERVER['PHP_SELF'].'">'
				,'<input type="hidden" name="page" value="'.$pre_page.'">'
				,'<script language="JavaScript">document.page.submit();</script></form>';
    	}
    	echo '<script type="text/javascript">window.setTimeout(window.location="'.$_SERVER['PHP_SELF'].'",0);</script>';
	}

	//ทำการแก้ไขตาราง
	if(isset($_POST['submit_edit'])) {
		$axUpdate = array(
			'Code_key' =>"$_POST[new_Code_key]"
			,'Status_key' =>"$_POST[new_Status_key]"
			,'ID_goods' =>"$_POST[new_ID_goods]");
		$sEditSql = buildSQLUpdate('key', 'ID_key', "$_POST[ID_key]", $axUpdate);
		if($mysqli->query($sEditSql)) echo "";
	} ?>

	<table class="table-hover" border="0" cellspacing="0" cellpadding="5">
	<tr style="background : grey; color: white;">
		<col width="150">
		<col width="200">
		<col width="150">
		<col width="100">

	    <th><a href='<?php echo "$_SERVER[PHP_SELF]".'?ORDERBY_key=ID_key'; ?>'>เลขที่คีย์</a></th>
	    <th>รหัสคีย์</a></th>
	    <th>สถานะ</th>
	    <th><a href='<?php echo "$_SERVER[PHP_SELF]".'?ORDERBY_key=ID_goods'; ?>'>ชื่อสินค้า</a></th>
	    <th></th>
	    <th></th>
  	</tr>

	<?php
	if(!isset($_SESSION['ORDERBY_key'])) $_SESSION['ORDERBY_key'] = 'ID_key';
	if(isset($_GET['ORDERBY_key'])) $_SESSION['ORDERBY_key'] = $_GET['ORDERBY_key'];

	$maxID=1;
	if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`key`')){
	    for ($ikey=0; $ikey < $result->num_rows; $ikey++) {
	        $row=$result->fetch_assoc();
	        if($maxID < $row['ID_key']) $maxID = $row['ID_key'];
	    }
	}

	if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`key` , `'.DB_NAME.'`.`goods` WHERE `key`.`ID_goods` = `goods`.`ID_goods` ORDER BY `key`.`'.$_SESSION['ORDERBY_key'].'` ASC LIMIT '.$first.', '.$limit.'')){
	    for ($ikey=0; $ikey < $result->num_rows; $ikey++) {
	        $row=$result->fetch_assoc();

	switch ($sAct) {
		case 'edit':
			if($_GET['ID_edit'] == $row['ID_key']) {
				echo "<tr>";
	        	echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>";
	        		echo "<td>";
		             	echo "$row[ID_key]";
		             	echo '<input type="hidden" name="ID_key" value = "'.$row['ID_key'].'">';
		            echo "</td>";

	        		echo "<td>";
	        			echo '<textarea placeholder="รหัสคีย์" size = "10" name="new_Code_key" value='.$row['Code_key'].'>'.$row['Code_key'].'</textarea>';
	        		echo "</td>";

	        		echo "<td>";
	        			echo '<select name = "new_Status_key">';

	        			echo '<option value = "'.$row['Status_key'].'">';
        					echo "$row[Status_key]";
        				echo "</option>";

        				echo "<option value = 'notsell'>";
        					echo "notsell";
        				echo "</option>";

        				echo "<option value = 'sold'>";
        					echo "sold";
        				echo "</option>";

	        			echo "</select>";
	        		echo "</td>";

	        		echo "<td>";
	        			$resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`ID_goods` = '.$row['ID_goods'].' ');
	        			$rowgoods=$resultGoods->fetch_assoc();
	        			echo '<select name = "new_ID_goods">';
		        			echo "<option value = '".$rowgoods['ID_goods']."'>";
	        					echo "$rowgoods[Name_goods]";
	        				echo "</option>";
			        		if($resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` ORDER BY `goods`.`Name_goods` ASC')){
							    for ($igoods=0; $igoods < $resultGoods->num_rows; $igoods++) {
							        $rowgoods=$resultGoods->fetch_assoc();
							        echo "<option value = '".$rowgoods['ID_goods']."'>";
		        						echo "$rowgoods[Name_goods]";
		        					echo "</option>";
							    }
							}
						echo "</select>";
	        		echo "</td>";

	        		echo "<td>";
	        			echo '<input type="submit" name="submit_edit" value="ok">';
	        		echo "</td>";

	        		echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>".'<input type = "submit" name = "cancel" value = "cancel">'.'</form>';
	                echo "</td>";

	        	echo "</form>";
			} 
			else {
				echo "<tr>";
	                echo "<td>";
	                	echo "$row[ID_key]";
	                echo "</td>";

	                echo "<td>";
	                	echo "$row[Code_key]";
	                echo "</td>";
	                		
	                echo "<td>";
	                	echo "$row[Status_key]";
	                echo "</td>";

	                $resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`ID_goods` = '.$row['ID_goods'].' ');
	        		$rowgoods=$resultGoods->fetch_assoc();
	        		echo "<td>";
	                	echo "$rowgoods[Name_goods]";
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
	                		,'<input type = "hidden" name = "ID_edit" value = "'.$row['ID_key'].'">'
	                		,'<input type = "submit" name = "act" value = "edit">'
	                	,'</form>';
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
	                		,'<input type = "hidden" name = "ID_del" value = "'.$row['ID_key'].'">'
	                		,'<input type = "submit" name = "act" value = "delete">'
	                	,'</form>';
	                echo "</td>";
	            echo "</tr>";
			}
			break;

		case 'delete':
			if($_GET['ID_del'] == $row['ID_key']) {
	            echo '<tr style = "color: RED;">';
	                echo "<td>";
	                	echo "$row[ID_key]";
	                echo "</td>";

	                echo "<td>";
	                	echo "$row[Code_key]";
	                echo "</td>";
	                		
	                echo "<td>";
	                	echo "$row[Status_key]";
	                echo "</td>";

	                $resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`ID_goods` = '.$row['ID_goods'].' ');
	        		$rowgoods=$resultGoods->fetch_assoc();
	        		echo "<td>";
	                	echo "$rowgoods[Name_goods]";
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>"
	                		,'<input type = "hidden" name = "ID_key" value = "'.$row['ID_key'].'">'
	                		,'<input type = "submit" name = "submit_del" value = "ok">'
	                	,'</form>';
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>".'<input type = "submit" name = "cancel" value = "cancel">'.'</form>';
	                echo "</td>";
	            echo "</tr>";
			}
			else {
	            echo "<tr>";
	                echo "<td>";
	                	echo "$row[ID_key]";
	                echo "</td>";

	                echo "<td>";
	                	echo "$row[Code_key]";
	                echo "</td>";
	                		
	                echo "<td>";
	                	echo "$row[Status_key]";
	                echo "</td>";

	                $resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`ID_goods` = '.$row['ID_goods'].' ');
	        		$rowgoods=$resultGoods->fetch_assoc();
	        		echo "<td>";
	                	echo "$rowgoods[Name_goods]";
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
	                		,'<input type = "hidden" name = "ID_edit" value = "'.$row['ID_key'].'">'
	                		,'<input type = "submit" name = "act" value = "edit">'
	                	,'</form>';
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
	                		,'<input type = "hidden" name = "ID_del" value = "'.$row['ID_key'].'">'
	                		,'<input type = "submit" name = "act" value = "delete">'
	                	,'</form>';
	                echo "</td>";

	            echo "</tr>";
			}	
			break;
		
		default: 
	            echo "<tr>";
	                echo "<td>";
	                	echo "$row[ID_key]";
	                echo "</td>";

	                echo "<td>";
	                	echo "$row[Code_key]";
	                echo "</td>";
	                		
	                echo "<td>";
	                	echo "$row[Status_key]";
	                echo "</td>";

	                $resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`ID_goods` = '.$row['ID_goods'].' ');
	        		$rowgoods=$resultGoods->fetch_assoc();
	        		echo "<td>";
	                	echo "$rowgoods[Name_goods]";
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
	                		,'<input type = "hidden" name = "ID_edit" value = "'.$row['ID_key'].'">'
	                		,'<input type = "submit" name = "act" value = "edit">'
	                	,'</form>';
	                echo "</td>";

	                echo "<td>";
	                	echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
	                		,'<input type = "hidden" name = "ID_del" value = "'.$row['ID_key'].'">'
	                		,'<input type = "submit" name = "act" value = "delete">'
	                	,'</form>';
	                echo "</td>";

	            echo "</tr>";
			break;
		   }
        }
        if($page == $All_page) {
        echo "<tr>";
        	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
        		echo "<td>";
        		$iNewID = $maxID + 1;
	             	echo '<input type = "hidden" name = "new_ID_key" value = "'.$iNewID.'">';
	            echo "</td>";

        		echo "<td>";
	        			echo '<textarea placeholder="รหัสคีย์" size = "10" name="new_Code_key" value=""></textarea>';
	        		echo "</td>";

	        		echo "<td>";
	        			echo '<select name = "new_Status_key">';

        				echo "<option value = 'notsell'>";
        					echo "notsell";
        				echo "</option>";

        				echo "<option value = 'sold'>";
        					echo "sold";
        				echo "</option>";

	        			echo "</select>";
	        		echo "</td>";

	        		echo "<td>";
	        			echo '<select name = "new_ID_goods">';
			        		if($resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` ORDER BY `goods`.`Name_goods` ASC')){
							    for ($igoods=0; $igoods < $resultGoods->num_rows; $igoods++) {
							        $rowgoods=$resultGoods->fetch_assoc();
							        echo "<option value = '".$rowgoods['ID_goods']."'>";
		        						echo "$rowgoods[Name_goods]";
		        					echo "</option>";
							    }
							}
						echo "</select>";
	        		echo "</td>";

        		echo "<td>";
        			echo '<button type="submit" style="margin-left: 5px;" class="btn btn-default" name="submit_add" value="Add">'
        			,'<span class="glyphicons glyphicon-plus"></span> '
        			,'</button>';
        		echo "</td>";
        	echo "</form>";
        echo "</tr>";
    	}
    	else if($page == 1 and $per_page == 0){
    	echo "<tr>";
        	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
        		echo "<td>";
        		$iNewID = 1;
        			echo($iNewID);
	             	echo '<input type = "hidden" name = "new_ID_key" value = "'.$iNewID.'">';
	            echo "</td>";

        		echo "<td>";
	        			echo '<textarea placeholder="รหัสคีย์" size = "10" name="new_Code_key" value=""></textarea>';
	        		echo "</td>";

	        		echo "<td>";
	        			echo '<select name = "new_Status_key">';

        				echo "<option value = 'notsell'>";
        					echo "notsell";
        				echo "</option>";

        				echo "<option value = 'sold'>";
        					echo "sold";
        				echo "</option>";

	        			echo "</select>";
	        		echo "</td>";

	        		echo "<td>";
	        			echo '<select name = "new_ID_goods">';
			        		if($resultGoods = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` ORDER BY `goods`.`Name_goods` ASC')){
							    for ($igoods=0; $igoods < $resultGoods->num_rows; $igoods++) {
							        $rowgoods=$resultGoods->fetch_assoc();
							        echo "<option value = '".$rowgoods['ID_goods']."'>";
		        						echo "$rowgoods[Name_goods]";
		        					echo "</option>";
							    }
							}
						echo "</select>";
	        		echo "</td>";

        		echo "<td>";
        			echo '<button type="submit" style="margin-left: 5px;" class="btn btn-default" name="submit_add" value="Add">'
        			,'<span class="glyphicons glyphicon-plus"></span> '
        			,'</button>';
        		echo "</td>";
        	echo "</form>";
        echo "</tr>";	
    	}
	}
 ?>
 <tr>
  <td colspan="11">
    <div style="font-size: 16px; margin: 10px 5% 10px 5%;">
         <?php echo "หน้าที่ : $page"; ?>
         <?php $_SESSION['manage_key_page'] = $page; ?>
         <?php for ($i=1; $i < $All_page+1; $i++) { ?>
         <form style="display: inline; color:black;" name="manage_goods_page" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
           <input type="submit" name="page" value="<?php echo "$i"; ?>">
         </form>  
      <?php } ?>
    </div>
  </td>
</tr>
</table>
















