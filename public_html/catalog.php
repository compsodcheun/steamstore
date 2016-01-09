<?php 
include './temp/header.ini.php';
?>

<style type="text/css">
	a {
		color:white;
	}
</style>

<div class="container cus_hd" style="margin-bottom:650px">
	<div class="row">
		<div class="col-md-2">
			  <label for="amount" style="color:white; margin-bottom:10px">Price range:</label><br>
			  <input type="number" min="0" max="10000" class="form-control" id="amountMin" style="border:0; color:black; font-weight:bold; background-color:white; display:inline; width:60px; padding:0; text-align: center">
			  <h4 style="color:white; display:inline">To</h4>
			  <input type="number" min="0" max="10000" class="form-control" id="amountMax" style="border:0; color:black; font-weight:bold; background-color:white; display:inline; width:60px; padding:0; text-align: center">
			
			 
			<div id="slider-range" style="margin:10px 0px"></div>
			<button class="btn btn-primary" type="submit" style="width:100%">Filter</button>
		</div>
		<div class="col-md-10">
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist" >
			    <li role="presentation" class="active"><a href="#steam" aria-controls="steam" role="tab" data-toggle="tab" >Steam</a></li>
			    <li role="presentation"><a href="#origin" aria-controls="origin" role="tab" data-toggle="tab">Origin</a></li>
			    <li role="presentation"><a href="#uplay" aria-controls="uplay" role="tab" data-toggle="tab">Uplay</a></li>
			    <li role="presentation"><a href="#steamwallet" aria-controls="steamwallet" role="tab" data-toggle="tab">Steam Wallet</a></li>
			    
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="steam">
					

					  <?php 
					  //qry game
					 if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`Type_goods` = "steam" ')){
					     for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
					       $row=$result->fetch_assoc();
					       echo '<a href="#" class="hvr-grow">';
					       echo '<div class="col-sm-6 col-md-3">'
					       ,'<div class="thumbnail  tag" id="cus_thumb">';
					       
					       if(!empty($row['Pic_goods'])) echo '<img  src="'.$row['Pic_goods'].'"></a>';
					       else echo '<img src="./img/21.jpg">';

					       echo '<div id="pos_tag">';


					       //qry payrate
					       $rate = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`payrate`');
					       $rate = $rate->fetch_assoc();

					       if($row['Discount_goods'] > 0) {

					         //expression
					         $Price_with_Discount = (1-($row['Discount_goods']/100))*$row['Price_goods'];
					         $Price_with_Discount_Bank_payrate = ceil($Price_with_Discount * $rate['Bank_payrate']);
					         $Price_with_Discount_True_payrate = ceil($Price_with_Discount * $rate['True_payrate']);

					         echo '<span id="sp_tag">-'.$row['Discount_goods'].'% </span><span id="sp_pp">฿'.$Price_with_Discount_Bank_payrate.'</span><span id="sp_ppt"><b style="color:red;">True</b> ฿'.$Price_with_Discount_True_payrate.'</span>';
					       } 
					       else {
					         echo '<span id="sp_pp">฿'.ceil($row['Price_goods']*$rate['Bank_payrate']).'</span>'.'<span id="sp_ppt"><b style="color:red;">True</b> ฿'.ceil($row['Price_goods']*$rate['True_payrate']).'</span>';
					       } 

					       echo '</div>'
					       ,'</div>'
					       ,'</div>';

					       echo '</a>';

					     }
					   }

					?>

			    </div>
			    <div role="tabpanel" class="tab-pane" id="origin">

					   <?php 
					 //qry game
					   if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`Type_goods` = "origin" ')){
					       for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
					         $row=$result->fetch_assoc();
					         echo '<a href="#" class="hvr-grow">';
					         echo '<div class="col-sm-6 col-md-3">'
					         ,'<div class="thumbnail  tag" id="cus_thumb">';
					         
					         if(!empty($row['Pic_goods'])) echo '<img  src="'.$row['Pic_goods'].'"></a>';
					         else echo '<img src="./img/21.jpg">';

					         echo '<div id="pos_tag">';


					         //qry payrate
					         $rate = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`payrate`');
					         $rate = $rate->fetch_assoc();

					         if($row['Discount_goods'] > 0) {

					           //expression
					           $Price_with_Discount = (1-($row['Discount_goods']/100))*$row['Price_goods'];
					           $Price_with_Discount_Bank_payrate = ceil($Price_with_Discount * $rate['Bank_payrate']);
					           $Price_with_Discount_True_payrate = ceil($Price_with_Discount * $rate['True_payrate']);

					           echo '<span id="sp_tag">-'.$row['Discount_goods'].'% </span><span id="sp_pp">฿'.$Price_with_Discount_Bank_payrate.'</span><span id="sp_ppt"><b style="color:red;">True</b> ฿'.$Price_with_Discount_True_payrate.'</span>';
					         } 
					         else {
					           echo '<span id="sp_pp">฿'.ceil($row['Price_goods']*$rate['Bank_payrate']).'</span>'.'<span id="sp_ppt"><b style="color:red;">True</b> ฿'.ceil($row['Price_goods']*$rate['True_payrate']).'</span>';
					         } 

					         echo '</div>'
					         ,'</div>'
					         ,'</div>';

					         echo '</a>';

					       }
					     }

					  ?>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="uplay">
			    	<?php 
			    	//qry game
			    	  if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`Type_goods` = "uplay" ')){
			    	      for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
			    	        $row=$result->fetch_assoc();
			    	        echo '<a href="#" class="hvr-grow">';
			    	        echo '<div class="col-sm-6 col-md-3">'
			    	        ,'<div class="thumbnail  tag" id="cus_thumb">';
			    	        
			    	        if(!empty($row['Pic_goods'])) echo '<img  src="'.$row['Pic_goods'].'"></a>';
			    	        else echo '<img src="./img/21.jpg">';

			    	        echo '<div id="pos_tag">';


			    	        //qry payrate
			    	        $rate = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`payrate`');
			    	        $rate = $rate->fetch_assoc();

			    	        if($row['Discount_goods'] > 0) {

			    	          //expression
			    	          $Price_with_Discount = (1-($row['Discount_goods']/100))*$row['Price_goods'];
			    	          $Price_with_Discount_Bank_payrate = ceil($Price_with_Discount * $rate['Bank_payrate']);
			    	          $Price_with_Discount_True_payrate = ceil($Price_with_Discount * $rate['True_payrate']);

			    	          echo '<span id="sp_tag">-'.$row['Discount_goods'].'% </span><span id="sp_pp">฿'.$Price_with_Discount_Bank_payrate.'</span><span id="sp_ppt"><b style="color:red;">True</b> ฿'.$Price_with_Discount_True_payrate.'</span>';
			    	        } 
			    	        else {
			    	          echo '<span id="sp_pp">฿'.ceil($row['Price_goods']*$rate['Bank_payrate']).'</span>'.'<span id="sp_ppt"><b style="color:red;">True</b> ฿'.ceil($row['Price_goods']*$rate['True_payrate']).'</span>';
			    	        } 

			    	        echo '</div>'
			    	        ,'</div>'
			    	        ,'</div>';

			    	        echo '</a>';


			    	      }
			    	    }

			    	 ?>
			    </div>

			    <div role="tabpanel" class="tab-pane" id="steamwallet">
			    	
			    </div>
			  
			  </div>

			</div>
		</div>
	</div>
</div>

<?php 
include './temp/footer.ini.php';
?>