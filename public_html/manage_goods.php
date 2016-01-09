<!DOCTYPE html>

<?php
  $sTitle = 'Steam Store';
  $sFav = './img/Untitled.ico'; //icon on tab
  include './temp/header.ini.php'; 
?>     
     <!-- php manage code__________________________________________________________________________________________________________________________ -->
<?php
  //pagination
  $limit = 5;
    if (!isset($_POST['page'])) {
        if(empty($_SESSION['manage_goods_page'])) $page = 1;
        else $page = $_SESSION['manage_goods_page'];
    } else {
      $page = $_POST['page'];
    }
    $All_page = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods`');
    $All_page = ceil($All_page->num_rows/$limit); //Page cal
    $first = (($page-1)*$limit); //first
    $per_page = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` LIMIT '.$first.', '.$limit.'');
    $per_page = $per_page->num_rows;
    //echo "$per_page";

  if(isset($_GET['act'])) $sAct = $_GET['act'];
  else $sAct = '';

  if(isset($_POST['cancel'])) $sAct = '';

  //ทำการเพิ่ม
  if(isset($_POST['submit_add'])) {
    upLoad('new_Pic_goods');
    if($_FILES['new_Pic_goods']['name'] != '') {
      $axInsert = array(
        'ID_goods' => "$_POST[new_ID_goods]"
        ,'Name_goods' =>"$_POST[new_Name_goods]"
        ,'Date_goods' =>"$_POST[new_Date_goods]"
        ,'Type_goods' =>"$_POST[new_Type_goods]"
        ,'Price_goods' =>"$_POST[new_Price_goods]"
        ,'Stock_goods' =>"$_POST[new_Stock_goods]"
        ,'Discount_goods' =>"$_POST[new_Discount_goods]"
        ,'DiscountDateStart_goods' =>"$_POST[new_DiscountDateStart_goods]"
        ,'DiscountTimeStart_goods' =>"$_POST[new_DiscountTimeStart_goods]"
        ,'DiscountDateEnd_goods' =>"$_POST[new_DiscountDateEnd_goods]"
        ,'DiscountTimeEnd_goods' =>"$_POST[new_DiscountTimeEnd_goods]"
        ,'Pic_goods' =>"./images/".basename( $_FILES["new_Pic_goods"]["name"])
        ,'Add_goods' =>"$_POST[new_Add_goods]");
    } else {
      $axInsert = array(
        'ID_goods' => "$_POST[new_ID_goods]"
        ,'Name_goods' =>"$_POST[new_Name_goods]"
        ,'Date_goods' =>"$_POST[new_Date_goods]"
        ,'Type_goods' =>"$_POST[new_Type_goods]"
        ,'Price_goods' =>"$_POST[new_Price_goods]"
        ,'Stock_goods' =>"$_POST[new_Stock_goods]"
        ,'Discount_goods' =>"$_POST[new_Discount_goods]"
        ,'DiscountDateStart_goods' =>"$_POST[new_DiscountDateStart_goods]"
        ,'DiscountTimeStart_goods' =>"$_POST[new_DiscountTimeStart_goods]"
        ,'DiscountDateEnd_goods' =>"$_POST[new_DiscountDateEnd_goods]"
        ,'DiscountTimeEnd_goods' =>"$_POST[new_DiscountTimeEnd_goods]"
        ,'Add_goods' =>"$_POST[new_Add_goods]");
    }
    $sInsertSql = buildSQLInsert('goods',$axInsert);
    if($mysqli->query($sInsertSql)) echo "";
    if($per_page == 5) {
      $next_page = $page+1;
      echo '<form name="page" method="post" action="'.$_SERVER['PHP_SELF'].'">'
      ,'<input type="hidden" name="page" value="'.$next_page.'">'
      ,'<script language="JavaScript">document.page.submit();</script></form>';
      }

      if($per_page == 0 and $page == 1) {
        echo '<script type="text/javascript">window.setTimeout(window.location="'.$_SERVER['PHP_SELF'].'",0);</script>';
      }
  }

  //ทำการลบสินค้าจากฐานข้อมูล
  if(isset($_POST['submit_del'])) {
    $sDelSql = buildSQLDelete('goods', 'ID_goods', "$_POST[ID_goods]");
    if($mysqli->query($sDelSql)) echo "";
     if($per_page == 1 and $page != 1) {
        $pre_page = $page-1;
        echo '<form name="page" method="post" action="'.$_SERVER['PHP_SELF'].'">'
        ,'<input type="hidden" name="page" value="'.$pre_page.'">'
        ,'<script language="JavaScript">document.page.submit();</script></form>';
      }
      echo '<script type="text/javascript">window.setTimeout(window.location="'.$_SERVER['PHP_SELF'].'",0);</script>';
  }

  //ทำการแก้ไขตารางสินค้า
  if(isset($_POST['submit_edit'])) {
    if($_FILES['new_Pic_goods']['name'] != '') {
      upLoad('new_Pic_goods');
      $axUpdate = array(
        'Name_goods' =>"$_POST[new_Name_goods]"
        ,'Date_goods' =>"$_POST[new_Date_goods]"
        ,'Type_goods' =>"$_POST[new_Type_goods]"
        ,'Price_goods' =>"$_POST[new_Price_goods]"
        ,'Stock_goods' =>"$_POST[new_Stock_goods]"
        ,'Discount_goods' =>"$_POST[new_Discount_goods]"
        ,'DiscountDateStart_goods' =>"$_POST[new_DiscountDateStart_goods]"
        ,'DiscountTimeStart_goods' =>"$_POST[new_DiscountTimeStart_goods]"
        ,'DiscountDateEnd_goods' =>"$_POST[new_DiscountDateEnd_goods]"
        ,'DiscountTimeEnd_goods' =>"$_POST[new_DiscountTimeEnd_goods]"
        ,'Pic_goods' =>"./images/".basename( $_FILES["new_Pic_goods"]["name"])
        ,'Add_goods' =>"$_POST[new_Add_goods]");
    } else {
      $axUpdate = array(
        'Name_goods' =>"$_POST[new_Name_goods]"
        ,'Date_goods' =>"$_POST[new_Date_goods]"
        ,'Type_goods' =>"$_POST[new_Type_goods]"
        ,'Price_goods' =>"$_POST[new_Price_goods]"
        ,'Stock_goods' =>"$_POST[new_Stock_goods]"
        ,'Discount_goods' =>"$_POST[new_Discount_goods]"
        ,'DiscountDateStart_goods' =>"$_POST[new_DiscountDateStart_goods]"
        ,'DiscountTimeStart_goods' =>"$_POST[new_DiscountTimeStart_goods]"
        ,'DiscountDateEnd_goods' =>"$_POST[new_DiscountDateEnd_goods]"
        ,'DiscountTimeEnd_goods' =>"$_POST[new_DiscountTimeEnd_goods]"
        ,'Pic_goods' =>"$_POST[old_Pic_goods]"
        ,'Add_goods' =>"$_POST[new_Add_goods]");
    }
    $sEditSql = buildSQLUpdate('goods', 'ID_goods', "$_POST[ID_goods]", $axUpdate);
    if($mysqli->query($sEditSql)) echo "";

  } 

  $maxID=1;
  if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods`')){
      for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
          $row=$result->fetch_assoc();
          if($maxID < $row['ID_goods']) $maxID = $row['ID_goods'];
      }
  }

  ?>

  <table class="table-hover" border="0" cellspacing="0" cellpadding="5" style="margin-top: 100px">
  <tr style="background : grey; color: white;">
    <col width="150">
    <col width="200">
    <col width="150">
    <col width="100">
    <col width="100">
    <col width="150">
    <col width="150">
    <col width="150">
    <col width="150">
    <col width="150">
    <col width="150">

      <th><a href='<?php echo "$_SERVER[PHP_SELF]".'?ORDERBY_goods=ID_goods'; ?>'>เลขที่สินค้า</a></th>
      <th><a href='<?php echo "$_SERVER[PHP_SELF]".'?ORDERBY_goods=Name_goods'; ?>'>ชื่อสินค้า</a></th>
      <th>วันที่ออก</th>
      <th>ประเภท</th>
      <th>ราคาเต็ม (THB)</th>
      <th>จำนวน</th>
      <th>ส่วนลด (%)</th>
      <th>วันที่เริ่มลด</th>
      <th>เวลาที่เริ่มลด</th>
      <th>วันที่หยุดลด</th>
      <th>เวลาที่หยุดลด</th>
      <th>ภาพสินค้า</th>
      <th>รายละเอียด</th>
      <th></th>
      <th></th>
    </tr>

  <?php
  if(!isset($_SESSION['ORDERBY_goods'])) $_SESSION['ORDERBY_goods'] = 'ID_goods';
  if(isset($_GET['ORDERBY_goods'])) $_SESSION['ORDERBY_goods'] = $_GET['ORDERBY_goods'];


  if($result = $mysqli->query('SELECT * FROM `'.DB_NAME.'`.`goods` ORDER BY `goods`.`'.$_SESSION['ORDERBY_goods'].'` ASC LIMIT '.$first.', '.$limit.'')){
      for ($igoods=0; $igoods < $result->num_rows; $igoods++) {
          $row=$result->fetch_assoc();

  switch ($sAct) {
    case 'edit':
      if($_GET['ID_edit'] == $row['ID_goods']) {
        echo "<tr>";
            echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>";
              echo "<td>";
                  echo "$row[ID_goods]";
                  echo '<input type="hidden" name="ID_goods" value = "'.$row['ID_goods'].'">';
                echo "</td>";

              echo "<td>";
                echo '<textarea placeholder="ชื่อสินค้า" size = "10" name="new_Name_goods" value='.$row['Name_goods'].'>'.$row['Name_goods'].'</textarea>';
              echo "</td>";

              echo "<td>";
                echo '<input type = "date" name = "new_Date_goods" value='.$row['Date_goods'].' size = "5">';
              echo "</td>";

              echo "<td>";
                echo '<select name = "new_Type_goods">';
                echo "<option value = 'uplay'>";
                  echo "Uplay";
                echo "</option>";

                echo "<option value = 'origin'>";
                  echo "Origin";
                echo "</option>";

                echo "<option value = 'steam'>";
                  echo "Steam";
                echo "</option>";

                echo "</select>";
              echo "</td>";

              echo "<td>";
                echo '<input type = "number" placeholder="เช่น 100.00" step = "0.01" min = "0" name = "new_Price_goods" value = '.$row['Price_goods'].' style="width: 7em">';
              echo "</td>";

              echo "<td>";
                echo '<input type = "number" placeholder="เช่น 2" step = "1" min = "0" name = "new_Stock_goods" value = "'.$row['Stock_goods'].'" style="width: 7em">';
              echo "</td>";

              echo "<td>";
                echo '<input type = "number" placeholder="เช่น 2" step = "0.01" min = "0" max = "100" name = "new_Discount_goods" value = "'.$row['Discount_goods'].'" style="width: 7em">';
              echo "</td>";

              echo "<td>";
                echo '<input type = "date" name = "new_DiscountDateStart_goods" value = "'.$row['DiscountDateStart_goods'].'">';
              echo "</td>";

              echo "<td>";
                echo '<input type = "time" name = "new_DiscountTimeStart_goods" value = "'.$row['DiscountDateStart_goods'].'">';
              echo "</td>";

              echo "<td>";
                echo '<input type = "date" name = "new_DiscountDateEnd_goods" value = "'.$row['DiscountDateEnd_goods'].'">';
              echo "</td>";

              echo "<td>";
                echo '<input type = "time" name = "new_DiscountTimeEnd_goods" value = "'.$row['DiscountTimeEnd_goods'].'">';
              echo "</td>";

              echo "<td>";
                echo '<input type="file" name="new_Pic_goods" id="fileUpload">';
                echo '<input type="hidden" name="old_Pic_goods" value = "'.$row['Pic_goods'].'">';
              echo "</td>";

              echo "<td>";
                echo '<textarea name="new_Add_goods" value = '.$row['Add_goods'].'>'.$row['Add_goods'].'</textarea>';
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
                    echo "$row[ID_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Name_goods]";
                  echo "</td>";
                      
                  echo "<td>";
                    echo "$row[Date_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Type_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Price_goods]";
                  echo "</td>";
                 
                  echo "<td>";
                    echo "$row[Stock_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Discount_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    $sImgPath = $row['Pic_goods'];
                    if (!empty($row['Pic_goods'])) {
                      echo '<img width="175" height="100" src="'.$sImgPath.'">';
                    }
                    else {
                      echo '<img width="175" height="100" src="./images/no_image.png">';
                    }
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Add_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
                      ,'<input type = "hidden" name = "ID_edit" value = "'.$row['ID_goods'].'">'
                      ,'<input type = "submit" name = "act" value = "edit">'
                    ,'</form>';
                  echo "</td>";

                  echo "<td>";
                    echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
                      ,'<input type = "hidden" name = "ID_del" value = "'.$row['ID_goods'].'">'
                      ,'<input type = "submit" name = "act" value = "delete">'
                    ,'</form>';
                  echo "</td>";

              echo "</tr>";
      }
      break;

    case 'delete':
      if($_GET['ID_del'] == $row['ID_goods']) {
              echo '<tr style = "color: RED;">';
                  echo "<td>";
                    echo "$row[ID_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Name_goods]";
                  echo "</td>";
                      
                  echo "<td>";
                    echo "$row[Date_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Type_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Price_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Stock_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Discount_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    $sImgPath = $row['Pic_goods'];
                    if (!empty($row['Pic_goods'])) {
                      echo '<img width="175" height="100" src="'.$sImgPath.'">';
                    }
                    else {
                      echo '<img width="175" height="100" src="./images/no_image.png">';
                    }
                  echo "</td>";

                  echo "<td>";
                    echo '<textarea readonly name="new_Add_goods" value = '.$row['Add_goods'].'>'.$row['Add_goods'].'</textarea>';
                  echo "</td>";

                  echo "<td>";
                    echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>"
                      ,'<input type = "hidden" name = "ID_goods" value = "'.$row['ID_goods'].'">'
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
                    echo "$row[ID_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Name_goods]";
                  echo "</td>";
                      
                  echo "<td>";
                    echo "$row[Date_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Type_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Price_goods]";
                  echo "</td>";
               
                  echo "<td>";
                    echo "$row[Stock_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Discount_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    $sImgPath = $row['Pic_goods'];
                    if (!empty($row['Pic_goods'])) {
                      echo '<img width="175" height="100" src="'.$sImgPath.'">';
                    }
                    else {
                      echo '<img width="175" height="100" src="./images/no_image.png">';
                    }
                  echo "</td>";

                  echo "<td>";
                    echo '<textarea readonly name="new_Add_goods" value = '.$row['Add_goods'].'>'.$row['Add_goods'].'</textarea>';
                  echo "</td>";

                  echo "<td>";
                    echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
                      ,'<input type = "hidden" name = "ID_edit" value = "'.$row['ID_goods'].'">'
                      ,'<input type = "submit" name = "act" value = "edit">'
                    ,'</form>';
                  echo "</td>";

                  echo "<td>";
                    echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
                      ,'<input type = "hidden" name = "ID_del" value = "'.$row['ID_goods'].'">'
                      ,'<input type = "submit" name = "act" value = "delete">'
                    ,'</form>';
                  echo "</td>";

              echo "</tr>";
      } 
      break;
    
    default: 
              echo "<tr>";
                  echo "<td>";
                    echo "$row[ID_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Name_goods]";
                  echo "</td>";
                      
                  echo "<td>";
                    echo "$row[Date_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Type_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Price_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Stock_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[Discount_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeStart_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountDateEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    echo "$row[DiscountTimeEnd_goods]";
                  echo "</td>";

                  echo "<td>";
                    $sImgPath = $row['Pic_goods'];
                    if (!empty($row['Pic_goods'])) {
                      echo '<img width="175" height="100" src="'.$sImgPath.'">';
                    }
                    else {
                      echo '<img width="175" height="100" src="./images/no_image.png">';
                    }
                  echo "</td>";

                  echo "<td>";
                    echo '<textarea readonly name="new_Add_goods" value = '.$row['Add_goods'].'>'.$row['Add_goods'].'</textarea>';
                  echo "</td>";

                  echo "<td>";
                    echo "<form action='".$_SERVER['PHP_SELF']."' method='GET'>"
                      ,'<input type = "hidden" name = "ID_edit" value = "'.$row['ID_goods'].'">'
                      ,'<input type = "submit" name = "act" value = "edit">'
                    ,'</form>';
                  echo "</td>";

                  echo "<td>";
                    echo "<form action='".$_SERVER['PHP_SELF']."' method='get'>"
                      ,'<input type = "hidden" name = "ID_del" value = "'.$row['ID_goods'].'">'
                      ,'<input type = "submit" name = "act" value = "delete">'
                    ,'</form>';
                  echo "</td>";

              echo "</tr>";
      break;
       }
        }
        if($page == $All_page) {
        echo "<tr>";
          echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>";
            echo "<td>";
            $iNewID = $maxID + 1;
            echo "$iNewID";
                echo '<input type = "hidden" name = "new_ID_goods" value = "'.$iNewID.'">';
              echo "</td>";

            echo "<td>";
              echo '<textarea name="new_Name_goods"></textarea>';
            echo "</td>";

            $sDefualtDate = date("Y-m-d");
            echo "<td>";
              echo '<input type = "date" name = "new_Date_goods" value='.date('Y-m-d').' size = "5">';
            echo "</td>";

            echo "<td>";
              echo '<select name = "new_Type_goods">';
                echo "<option value = 'uplay'>";
                  echo "Uplay";
                echo "</option>";

                echo "<option value = 'origin'>";
                  echo "Origin";
                echo "</option>";

                echo "<option value = 'steam'>";
                  echo "Steam";
                echo "</option>";

            echo "</td>";

            echo "<td>";
              echo '<input type = "number" placeholder="เช่น 100.00" step = "0.01" min = "0" name = "new_Price_goods" value = "" style="width: 7em">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "number" placeholder="เช่น 2" step = "1" min = "0" name = "new_Stock_goods" value = "" style="width: 7em">';
            echo "</td>";


            echo "<td>";
              echo '<input type = "number" placeholder="เช่น 2" step = "0.01" min = "0" max = "100" name = "new_Discount_goods" value = "" style="width: 7em">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "date" name = "new_DiscountDateStart_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "time" name = "new_DiscountTimeStart_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "date" name = "new_DiscountDateEnd_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "time" name = "new_DiscountTimeEnd_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type="file" name="new_Pic_goods" id="fileUpload">';
            echo "</td>";

            echo "<td>";
              echo '<textarea name="new_Add_goods"></textarea>';
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
          echo "<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>";
            echo "<td>";
            $iNewID=1;
              echo "$iNewID";
              echo '<input type = "hidden" name = "new_ID_goods" value = "'.$iNewID.'">';
              echo "</td>";

            echo "<td>";
              echo '<textarea name="new_Name_goods"></textarea>';
            echo "</td>";

            $sDefualtDate = date("Y-m-d");
            echo "<td>";
              echo '<input type = "date" name = "new_Date_goods" value='.date('Y-m-d').' size = "5">';
            echo "</td>";

            echo "<td>";
              echo '<select name = "new_Type_goods">';
                echo "<option value = 'uplay'>";
                  echo "Uplay";
                echo "</option>";

                echo "<option value = 'origin'>";
                  echo "Origin";
                echo "</option>";

                echo "<option value = 'steam'>";
                  echo "Steam";
                echo "</option>";

              echo "</select>";
            echo "</td>";

            echo "<td>";
              echo '<input type = "number" placeholder="เช่น 100.00" step = "0.01" min = "0" name = "new_Price_goods" value = "" style="width: 7em">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "number" placeholder="เช่น 2" step = "1" min = "0" name = "new_Stock_goods" value = "" style="width: 7em">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "number" placeholder="เช่น 2" step = "0.01" min = "0" max = "100" name = "new_Discount_goods" value = "" style="width: 7em">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "date" name = "new_DiscountDateStart_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "time" name = "new_DiscountTimeStart_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "date" name = "new_DiscountDateEnd_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type = "time" name = "new_DiscountTimeEnd_goods" value = "">';
            echo "</td>";

            echo "<td>";
              echo '<input type="file" name="new_Pic_goods" id="fileUpload">';
            echo "</td>";

            echo "<td>";
              echo '<textarea name="new_Add_goods"></textarea>';
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
         <?php $_SESSION['manage_goods_page'] = $page; ?>
         <?php for ($i=1; $i < $All_page+1; $i++) { ?>
         <form style="display: inline; color:black;" name="manage_goods_page" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
           <input type="submit" name="page" value="<?php echo "$i"; ?>">
         </form>  
      <?php } ?>
    </div>
  </td>
</tr>
</table>

<!-- END php manage code__________________________________________________________________________________________________________________________ -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
