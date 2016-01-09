<?php 
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
?>	

<?php 

	//print_r($jgame);
	 $q = $_GET['sq'];

		preg_match_all('!\d+!', $q, $matches);
		//print_r($matches);

		foreach ($matches as $value) {
			if(is_array($matches)) {
				foreach ($value as $v) {
					$id = $v;
				}
			}
		}

		//echo "$q</br>";
		//echo $id."</br>";

		if(isset($id)) {
			if (strpos($q,'app') !== false) {
			 	$game = file_get_contents('https://store.steampowered.com/api/appdetails/?appids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {
						if(isset($jgame[$id]['data']['header_image'])) {
							echo '<img src='.$jgame[$id]['data']['header_image'].'>'."</br>";
						}

						if(isset($jgame[$id]['data']['name'])) {
							echo($jgame[$id]['data']['name'])."</br>";
						}    

						if(isset($jgame[$id]['data']['price_overview']['initial'])) {
							//echo ceil($jgame[$id]['data']['price_overview']['initial']/100).$jgame[$id]['data']['price_overview']['currency']."</br>";
						} 

						if(isset($jgame[$id]['data']['price_overview']['final'])) {
							//echo ceil($jgame[$id]['data']['price_overview']['final']/100).$jgame[$id]['data']['price_overview']['currency']."</br>";
						}
					}
				}  
			}
			else if(strpos($q,'sub') !== false) {

				$game = file_get_contents('https://store.steampowered.com/api/packagedetails/?packageids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {
						if(isset($jgame[$id]['data']['header_image'])) {
							echo '<img src='.$jgame[$id]['data']['header_image'].'>'."</br>";
						} 

						if(isset($jgame[$id]['data']['name'])) {
							echo($jgame[$id]['data']['name'])."</br>";   
						} 

						if(isset($jgame[$id]['data']['price']['initial'])) {
							//echo ceil($jgame[$id]['data']['price']['initial']/100).$jgame[$id]['data']['price']['currency']."</br>";
						} 

						if(isset($jgame[$id]['data']['price']['final'])) {
							//echo ceil($jgame[$id]['data']['price']['final']/100).$jgame[$id]['data']['price']['currency']."</br>"; 
						} 
					}
				}
			}

		}

		if(empty($jgame)) {
			if(isset($id)) {
			if (strpos($q,'app') !== false) {
			 	$game = file_get_contents_curl('https://store.steampowered.com/api/appdetails/?appids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {
						if(isset($jgame[$id]['data']['header_image'])) {
							echo '<img src='.$jgame[$id]['data']['header_image'].'>'."</br>";
						}

						if(isset($jgame[$id]['data']['name'])) {
							echo($jgame[$id]['data']['name'])."</br>";
						}    

						if(isset($jgame[$id]['data']['price_overview']['initial'])) {
							//echo ceil($jgame[$id]['data']['price_overview']['initial']/100).$jgame[$id]['data']['price_overview']['currency']."</br>";
						} 

						if(isset($jgame[$id]['data']['price_overview']['final'])) {
							//echo ceil($jgame[$id]['data']['price_overview']['final']/100).$jgame[$id]['data']['price_overview']['currency']."</br>";
						}
					}
				}  
			}
			else if(strpos($q,'sub') !== false) {

				$game = file_get_contents_curl('https://store.steampowered.com/api/packagedetails/?packageids='.$id.'&cc=th');

				$jgame = json_decode($game, true);

				if($jgame[$id]['success']) {
					if(!$jgame[$id]['data']['is_free']) {
						if(isset($jgame[$id]['data']['header_image'])) {
							echo '<img src='.$jgame[$id]['data']['header_image'].'>'."</br>";
						} 

						if(isset($jgame[$id]['data']['name'])) {
							echo($jgame[$id]['data']['name'])."</br>";   
						} 

						if(isset($jgame[$id]['data']['price']['initial'])) {
							//echo ceil($jgame[$id]['data']['price']['initial']/100).$jgame[$id]['data']['price']['currency']."</br>";
						} 

						if(isset($jgame[$id]['data']['price']['final'])) {
							//echo ceil($jgame[$id]['data']['price']['final']/100).$jgame[$id]['data']['price']['currency']."</br>"; 
						} 
					}
				}
			}
		}
	}
	echo "</br>";

 ?>