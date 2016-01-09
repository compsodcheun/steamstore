<?php
	session_start();

	// กรณียังไม่เคย login เข้าสู่ระบบเลย
	if (!isset($_SESSION['status_login'])) {
		$_SESSION['status_login'] = FALSE;
	}

	function upLoad($fKey, $target_dir = "./images/") {
		$target_file = $target_dir . basename($_FILES["$fKey"]["name"]);
		//echo "$target_file";
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["$fKey"]["tmp_name"]);
		    if($check !== false) {
		       // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		      // echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["$fKey"]["size"] > 50000000) {
		    //echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["$fKey"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["$fKey"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		        $check=1;
		    }
		}
	}

	function buildSQLInsert($sTableName, $axData=array()) {
		$sSql = '';
		$asFilds = array();
		if (!empty($axData)) {
			foreach ($axData as $sKey => $sData) {
				$asFilds[] = $sKey;
			}
			$sFilds = '`'.implode('`, `', $asFilds).'`';
			$sData = '\''.implode('\', \'', $axData).'\'';
			$sSql = 'INSERT INTO `'.DB_NAME.'`.`'.$sTableName.'` ('.$sFilds.') VALUES ('.$sData.');';
		}
		return $sSql;
	}

	function buildSQLUpdate($sTableName, $sWhereFilds, $sWhereValue, $axData=array()) {
		$sSql = '';
		$asFildsData = array();
		if (!empty($axData)) {
			foreach ($axData as $sKey => $sData) {
				$asFildsData[] = '`'.$sKey.'` = \''.$sData.'\'';
			}
			$sData = implode(', ', $asFildsData);
			$sSql = 'UPDATE `'.DB_NAME.'`.`'.$sTableName.'` SET '.$sData.' WHERE `'.$sWhereFilds.'` = \''.$sWhereValue.'\';';
		}
		return $sSql;
	}

	function buildSQLDelete($sTableName, $sWhereFilds, $sWhereValue) {
		$sSql = '';
		if ($sWhereFilds != '' && $sWhereValue != '') {
			$sSql = 'DELETE FROM `'.DB_NAME.'`.`'.$sTableName.'` WHERE `'.$sWhereFilds.'` = \''.$sWhereValue.'\';';
		}
		return $sSql;
	}

	function checkSameData($sTableName, $sWhereFilds, $sWhereValue, $sWhere='') {
		global $pResCon;
		$bCheckSame = FALSE;
		$asFildsData = array();
		if ($sWhereFilds != '' && $sWhereValue != '') {
			$sSql = 'SELECT * FROM `'.DB_NAME.'`.`'.$sTableName.'` WHERE `'.$sWhereFilds.'` = \''.$sWhereValue.'\' ';
			if ($sWhere != '') {
				$sSql .= $sWhere;
			}
			$pRes = mysqli_query($pResCon, $sSql);
			if (mysqli_num_rows($pRes) > 0) {
				$bCheckSame = TRUE;
			}
		}
		return $bCheckSame;
	}

	function checkLogin($iPremission=0, $bRedirect=FALSE) {
		if ($iPremission == 0) {
			if ($_SESSION['status_login']) {
				if ($bRedirect) {
					header('Location:'.BASE_URL.'member.php?id_mem='.$_SESSION['ID_mem']);
				}
			} else {
				header('Location:'.BASE_URL.'premission.php');
			}
		} elseif ($iPremission == 1) {
			if ($_SESSION['status_login'] && $_SESSION['Permis_mem'] == 1) {
				if ($bRedirect) {
					header('Location:'.BASE_URL.'member.php?id_mem='.$_SESSION['ID_mem']);
				}
			} else {
				header('Location:'.BASE_URL.'premission.php');
			}
		}
	}

	function getPagination($iTotalRec, $iPage, $iPerPage, $iMaxShow=20, $sLink='', $sGetUrl='') {
		$iTotalPage = ceil($iTotalRec / $iPerPage);
		$iHaft = ceil($iMaxShow/2)-1;

		if (($iPage+$iHaft) > $iTotalPage) {
			$iStart = ($iTotalPage > $iMaxShow) ? $iTotalPage-$iMaxShow : 1;
		} elseif (($iPage-$iHaft) > 1) {
			$iStart = $iPage-$iHaft;
		} else {
			$iStart = 1;
		}

		$iStop = (($iPage+$iHaft) < $iTotalPage) ? $iPage+$iHaft : $iTotalPage;

		// Next page
		$sNextPage = '';
		if ($iPage < $iTotalPage) {
			$sNextPage = '<li><a href="'.$sLink.'?page='.($iPage+1).$sGetUrl.'" target="_self">ถัดไป &raquo;</a></li>';
		}

		// Previous page
		$sPrevPage = '';
		if ($iPage > 1) {
			$sPrevPage = '<li><a href="'.$sLink.'?page='.($iPage-1).$sGetUrl.'" target="_self">&laquo; ก่อนหน้า</a></li>';
		}

		$sPaging = '<div class="pagination pagination-centered">
						<ul>';
		$sPaging .= $sPrevPage;
		$sPaging .= ($iStart > 1) ? '<li><a href="'.$sLink.'?page=1'.$sGetUrl.'" target="_self">1</a></li><li class="disabled">...</li>' : '';

		for ($i=$iStart; $i<=$iStop; $i++) {
			if ($iPage == $i) {
				$sPaging .= '<li class="active"><a href="#">'.$i.'</a></li>';
			} else {
				$sPaging .= '<li><a href="'.$sLink.'?page='.$i.$sGetUrl.'" target="_self">'.$i.'</a></li>';
			}
		}

		$sPaging .= ($iStop < $iTotalPage) ? '<li class="sep_page">...</li><li><a href="'.$sLink.'?page='.$iTotalPage.$sGetUrl.'" target="_self">'.$iTotalPage.'</a></li>' : '';
		$sPaging .= $sNextPage;
		$sPaging .= '</ul>
					</div>';

		return $sPaging;
	}

    function file_get_contents_curl($url) {
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

	    $data = curl_exec($ch);
	    curl_close($ch);

	    return $data;
	}

	function getSteamData($url_steam) {
		if(!empty($url_steam)) {
			$q = $url_steam;
			preg_match_all('!\d+!', $q, $matches);
				//print_r($matches);

			foreach ($matches as $value) {
				if(is_array($matches)) {
					foreach ($value as $v) {
						$id = $v;
					}
				}
			}
		} 
		else {
			return NULL;
		}

		if(isset($id)) {
			if (strpos($q,'app') !== false) {
			 	$game = file_get_contents('https://store.steampowered.com/api/appdetails/?appids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {

						$axData['ID_gsteam'] = $id;

						if(isset($jgame[$id]['data']['name'])) {
							$axData['Name_gsteam'] = $jgame[$id]['data']['name'];
						}

						if(isset($jgame[$id]['data']['type'])) {
							$axData['Type_gsteam'] = $jgame[$id]['data']['type'];
						}

						if(isset($jgame[$id]['data']['release_date'])) {
							$axData['Date_gsteam'] = $jgame[$id]['data']['release_date']['date'];
						}

						if(isset($jgame[$id]['data']['header_image'])) {
							$axData['Pic_gsteam'] = $jgame[$id]['data']['header_image'];
						}     

						if(isset($jgame[$id]['data']['price_overview']['initial'])) {
							$axData['IniPrice_gsteam'] = ceil($jgame[$id]['data']['price_overview']['initial']/100);
						}

						if(isset($jgame[$id]['data']['price_overview']['final'])) {
							$axData['FinPrice_gsteam'] = ceil($jgame[$id]['data']['price_overview']['final']/100);
						}

						if(isset($jgame[$id]['data']['price_overview']['discount_percent'])) {
							$axData['Dis_gsteam'] = $jgame[$id]['data']['price_overview']['discount_percent'];
						}  
					}
					else {
						return NULL;
					}
				}
			}
			else if(strpos($q,'sub') !== false) {

				$game = file_get_contents('https://store.steampowered.com/api/packagedetails/?packageids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {

						$axData['ID_gsteam'] = $id;

						if(isset($jgame[$id]['data']['name'])) {
							$axData['Name_gsteam'] = $jgame[$id]['data']['name'];
						}

						$axData['Type_gsteam'] = 'Bundle';

						if(isset($jgame[$id]['data']['release_date'])) {
							$axData['Date_gsteam'] = $jgame[$id]['data']['release_date']['date'];
						}

						if(isset($jgame[$id]['data']['header_image'])) {
							$axData['Pic_gsteam'] = $jgame[$id]['data']['header_image'];
						}     

						if(isset($jgame[$id]['data']['price']['initial'])) {
							$axData['IniPrice_gsteam'] = ceil($jgame[$id]['data']['price']['initial']/100);
						}

						if(isset($jgame[$id]['data']['price']['final'])) {
							$axData['FinPrice_gsteam'] = ceil($jgame[$id]['data']['price']['final']/100);
						}

						if(isset($jgame[$id]['data']['price']['discount_percent'])) {
							$axData['Dis_gsteam'] = $jgame[$id]['data']['price']['discount_percent'];
						}

						if(isset($jgame[$id]['data']['apps'])) {
							$axData['apps'] = $jgame[$id]['data']['apps'];
						}  
					}
					else {
						return NULL;
					}
				}
			}
		}
		else {
			return NULL;
		}

		if(empty($jgame)) {
			if (strpos($q,'app') !== false) {
			 	$game = file_get_contents_curl('https://store.steampowered.com/api/appdetails/?appids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {

						$axData['ID_gsteam'] = $id;

						if(isset($jgame[$id]['data']['name'])) {
							$axData['Name_gsteam'] = $jgame[$id]['data']['name'];
						}

						if(isset($jgame[$id]['data']['type'])) {
							$axData['Type_gsteam'] = $jgame[$id]['data']['type'];
						}

						if(isset($jgame[$id]['data']['release_date'])) {
							$axData['Date_gsteam'] = $jgame[$id]['data']['release_date']['date'];
						}

						if(isset($jgame[$id]['data']['header_image'])) {
							$axData['Pic_gsteam'] = $jgame[$id]['data']['header_image'];
						}     

						if(isset($jgame[$id]['data']['price_overview']['initial'])) {
							$axData['IniPrice_gsteam'] = ceil($jgame[$id]['data']['price_overview']['initial']/100);
						}

						if(isset($jgame[$id]['data']['price_overview']['final'])) {
							$axData['FinPrice_gsteam'] = ceil($jgame[$id]['data']['price_overview']['final']/100);
						}

						if(isset($jgame[$id]['data']['price_overview']['discount_percent'])) {
							$axData['Dis_gsteam'] = $jgame[$id]['data']['price_overview']['discount_percent'];
						}  
					}
					else {
						return NULL;
					}
				}
			}
			else if(strpos($q,'sub') !== false) {

				$game = file_get_contents_curl('https://store.steampowered.com/api/packagedetails/?packageids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {

						$axData['ID_gsteam'] = $id;

						if(isset($jgame[$id]['data']['name'])) {
							$axData['Name_gsteam'] = $jgame[$id]['data']['name'];
						}

						$axData['Type_gsteam'] = 'Bundle';

						if(isset($jgame[$id]['data']['release_date'])) {
							$axData['Date_gsteam'] = $jgame[$id]['data']['release_date']['date'];
						}

						if(isset($jgame[$id]['data']['header_image'])) {
							$axData['Pic_gsteam'] = $jgame[$id]['data']['header_image'];
						}     

						if(isset($jgame[$id]['data']['price']['initial'])) {
							$axData['IniPrice_gsteam'] = ceil($jgame[$id]['data']['price']['initial']/100);
						}

						if(isset($jgame[$id]['data']['price']['final'])) {
							$axData['FinPrice_gsteam'] = ceil($jgame[$id]['data']['price']['final']/100);
						}

						if(isset($jgame[$id]['data']['price']['discount_percent'])) {
							$axData['Dis_gsteam'] = $jgame[$id]['data']['price']['discount_percent'];
						}

						if(isset($jgame[$id]['data']['apps'])) {
							$axData['apps'] = $jgame[$id]['data']['apps'];
						}  
					}
					else {
						return NULL;
					}
				}
			}
		}

		return $axData;
	}
?>
