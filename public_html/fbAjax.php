<?php
	require './config.php';
	require './con_db.php';
  	require './general.php';

	if(isset($_POST) and !isset($_SESSION['login'])) {
        $_SESSION['login']['status'] = true;
        $_SESSION['login']['type'] = 'facebook';
        $_SESSION['login']['table'] = 'user';
        $_SESSION['login']['id'] = $_POST['fbpost']['id'];

        $iID = $_SESSION['login']['id'];
        $result = $mysqli->query("SELECT * FROM user WHERE Type_user = 'facebook' AND ID_user = $iID ");
        $row=$result->fetch_assoc();
        if(empty($row)) {
            $axInsert = array(
            'ID_user' => $_SESSION['login']['id']
            ,'Name_user' => $_POST['fbpost']['name']
            ,'Type_user' => 'facebook');
        
            $sInsertSql = buildSQLInsert('user',$axInsert);
            if($mysqli->query($sInsertSql)) {
                echo "1";
            }
        }
        else {
            $axUpdate = array(
            'Name_user' => $_POST['fbpost']['name']);

            $sEditSql = buildSQLUpdate('user', 'ID_user', "$iID", $axUpdate);
            if($mysqli->query($sEditSql)) {
                echo "1";
            }
        }
	}
 ?>