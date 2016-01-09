<?php
  $sTitle = 'Steam Store';
  $sFav = 'img/Untitled.ico'; //icon on tab
  include './temp/header.ini.php'; 
?>
     <div class="container">

       <div class="row" style="margin-bottom:0;">
         <div class="col-md-12">
           <!--
           <img src="img/img_head.jpg" class="img-responsive"  id="cus_headImg"/>
           -->
           <div id="carousel-example-generic" class="carousel slide cus_headImg" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="img/img_head.jpg" alt="...">
                  <div class="carousel-caption">
                    <h4>WITCHER 3</h4>
                  </div>
                </div>
                <div class="item">
                  <img src="img/bg.jpg" alt="...">
                  <div class="carousel-caption">
                    <h4>Life is Strange</h4>
                  </div>
                </div>

                <div class="item">
                  <img src="img/farcrys.jpg" alt="...">
                  <div class="carousel-caption">
                    <h4>FarCry Primal</h4>
                  </div>
                </div>

              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
         </div>
       </div>
       <br>
       <!-- <marquee style="font-size: 24px; color: lime;">ยินดีต้อนรับสู่ Steam Store บริการขายเกมส์และ Steam Wallet ผ่านระบบออนไลน์</marquee> -->

       <div class="row" id="gpu_goods1">

          <h1 style="text-align:center; font-family:'Kanit'"><img src="img/ff.gif"  style="margin-right:7px;color:#fff"/>Hot Sale<img src="img/ff.gif"  style="margin-right:7px;color:#fff"/></h1>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail  tag" id="cus_thumb" >
              <img src="img/2.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail tag" id="cus_thumb" >
              <img src="img/3.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail tag" id="cus_thumb" >
              <img src="img/4.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail tag" id="cus_thumb" >
              <img src="img/5.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail tag" id="cus_thumb" >
              <img src="img/6.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail tag" id="cus_thumb" >
              <img src="img/7.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail tag" id="cus_thumb" >
              <img src="img/7.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="thumbnail tag" id="cus_thumb" >
              <img src="img/7.jpg">
              <div id="pos_tag">
                <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


              </div>
            </div>
          </div>


        </div>

         <div class="row" id="gpu_goods6">

            <div class="row">
             <h1 id="mu_head"><span class="glyphicon glyphicon-link"style="color:#000;margin-right:8px;color:red"></span>Steam URL</h1>
             <h4 style="color: white;">Example : <br>http://store.steampowered.com/app/271590/<br>http://store.steampowered.com/sub/64902/</h4>

              <form class="navbar-form navbar-left" method="get" action="./steamsearch.php" role="search_steam">
                <input type="text" name="url_steam" class="form-control autosuggest" placeholder="Search" onkeyup="showHint_url(this.value)" size="30">
                <input type="hidden" name="RequestType" value="steam_url">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
              </form>
            </div>

            <div class="row white_color">
              <div id="steamqry">
                
              </div>
            </div>  

           </div>

            <div class="row" id="gpu_goods4">

             <h1 id="mu_head"><span class="icon-steam2"style="color:#000;margin-right:8px"></span>Steam</h1>

             <?php 
             //qry game
            if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`gsteam` ')){
                for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
                  $row=$result->fetch_assoc();
                  echo '<a href="#" class="hvr-grow">';
                  echo '<div class="col-xs-12 col-sm-6 col-md-3">'
                  ,'<div class="thumbnail  tag" id="cus_thumb">';
                  
                  if(!empty($row['Pic_gsteam'])) echo '<img  src="'.$row['Pic_gsteam'].'">';
                  else echo '<img src="./img/21.jpg">';

                  echo "</a>";
                  echo '<div id="pos_tag">';


                  //qry payrate
                  $rate = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`payrate`');
                  $rate = $rate->fetch_assoc();

                  $Price_with_Discount_Bank_payrate = ceil($row['FinPrice_gsteam'] * $rate['Bank_payrate']);
                  $Price_with_Discount_True_payrate = ceil($row['FinPrice_gsteam'] * $rate['True_payrate']);

                  if($row['Dis_gsteam'] > 0) {
                    echo '<span id="sp_tag">-'.$row['Dis_gsteam'].'% </span><span id="sp_pp">฿'.$Price_with_Discount_Bank_payrate.'</span><span id="sp_ppt"><b style="color:red;">True</b> ฿'.$Price_with_Discount_True_payrate.'</span>';
                  } 
                  else {
                    echo '<span id="sp_pp">฿'.$Price_with_Discount_Bank_payrate.'</span><span id="sp_ppt"><b style="color:red;">True</b> ฿'.$Price_with_Discount_True_payrate.'</span>';
                  } 

                  echo '</div>'
                  ,'</div>'
                  ,'</div>';

                  echo '</a>';

                }
              }

           ?>


           </div>


         <div class="row" id="gpu_goods3">

            <h1 id="mu_head"><img src="img/origin.jpg" /> Origin</h1>

            <?php 
          //qry game
            if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`Type_goods` = "origin" ')){
                for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
                  $row=$result->fetch_assoc();
                  echo '<a href="#" class="hvr-grow">';
                  echo '<div class="col-xs-12 col-sm-6 col-md-3">'
                  ,'<div class="thumbnail  tag" id="cus_thumb">';
                  
                  if(!empty($row['Pic_goods'])) echo '<img  src="'.$row['Pic_goods'].'">';
                  else echo '<img src="./img/21.jpg">';

                  echo "</a>";
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

          <div class="row" id="gpu_goods2">

           <h1 id="mu_head"><img src="img/logoUplay.png" style="margin-right:7px;"/>Uplay</h1>

          <?php 
          //qry game
            if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` WHERE `goods`.`Type_goods` = "uplay" ')){
                for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
                  $row=$result->fetch_assoc();
                  echo '<a href="#" class="hvr-grow">';
                  echo '<div class="col-xs-12 col-sm-6 col-md-3">'
                  ,'<div class="thumbnail  tag" id="cus_thumb">';
                  
                  if(!empty($row['Pic_goods'])) echo '<img src="'.$row['Pic_goods'].'">';
                  else echo '<img src="./img/21.jpg">';

                  echo "</a>";
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

          
          <div class="row" id="gpu_goods5">

               <h1 id="mu_head">Steam Wallet</h1>

               <div class="col-xs-12 col-sm-6 col-md-3">
                 <div class="thumbnail tag" id="cus_thumb">
                   <img src="img/20.jpg">
                   <div id="pos_tag">
                     <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


                   </div>
                 </div>
               </div>

               <div class="col-xs-12 col-sm-6 col-md-3">
                 <div class="thumbnail tag" id="cus_thumb">
                   <img src="img/20.jpg">
                   <div id="pos_tag">
                     <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


                   </div>
                 </div>
               </div>

               <div class="col-xs-12 col-sm-6 col-md-3">
                 <div class="thumbnail tag" id="cus_thumb">
                   <img src="img/20.jpg">
                   <div id="pos_tag">
                     <span id="sp_tag">-30% </span><span id="sp_price">฿1657</span><span id="sp_pp">฿978</span>


                   </div>
                 </div>
               </div>


             </div>


      </div>
<?php
include './temp/footer.ini.php';
 ?>