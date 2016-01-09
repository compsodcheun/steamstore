<?php 
	require 'config.php';
	require 'con_db.php';

	 $q = $_GET['q'];


    $sql="SELECT *  FROM `goods` WHERE `Name_goods` LIKE '%".$q."%'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()){
    	echo "<a href='www.google.com'><div id='ajBar' style='height:50px'><img src='".$row['Pic_goods']."' style='width:87.5px;height:50px;margin-right:7px;float:left'>".$row['Name_goods']." </div></a><hr>";
    }

    $sql="SELECT *  FROM `gsteam` WHERE `Name_gsteam` LIKE '%".$q."%'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()){
    	echo "<a href='www.google.com'><div id='ajBar' style='height:50px'><img src='".$row['Pic_gsteam']."' style='width:87.5px;height:50px;margin-right:7px;float:left'>".$row['Name_gsteam']." </div></a><hr>";
    }
 ?>