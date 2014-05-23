<?php 

// set default time zone
date_default_timezone_set('Europe/Berlin');

function xovilichter_dynapso_scraper(){

	// set default time zone
	date_default_timezone_set('Europe/Berlin');

	// curl
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "http://www.dynapso.de/xovilichter/"); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	// dynapso mag den scraper nicht =(	
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36');
	//curl_setopt($ch, CURLOPT_USERAGENT, 'Xovilichter.Dynapso/1.1 (+https://github.com/xovilichter/dynapso)');
	//curl_setopt($ch, CURLOPT_REFERER, 'https://github.com/xovilichter/dynapso'); 
	$output = curl_exec($ch);
	curl_close($ch);
	
	// last update
	preg_match('#>letztes Update: (.*)h<#Uis', $output, $last_update_match);
	$last_update = date('Y-m-d H:i', strtotime($last_update_match[1]));
	
	// match results
	preg_match_all('#<td class="right"><span data-sort="(.*)">(.*)</span></td> <td class="link"><span data-sort="(.*)">(.*)</span></td> <td class="googlePlus">(.*)</td>#Uis', $output, $matches);
	
	$search_results = array();
	
	foreach($matches[1] as $n => $position){
	
		if(preg_match('#<img class="icon" src="http://www.dynapso.de/images/icons/(.*).png" alt="(.*)"#Uis', $matches[2][$n], $universal_search_match)){
			$type = $universal_search_match[1];		
		}else{
			$type = 'organic';
		}
		
		if(preg_match('#<a href="(.*)" title="(.*)" target="_blank"><img class="ico" src="(.*)" alt="(.*)"#Uis', $matches[5][$n], $google_plus_match)){
			$google_plus = array(
				'name' => $google_plus_match[4],
				'short_url' => $google_plus_match[1],
			);
		}else{
			$google_plus = array();
		}
	
		$search_results[] = array(
			'position' => $position,
			'url' => $matches[3][$n],
			'type' => $type,
			'google_plus' => $google_plus,
		);
	}
	
	return array(
		'last_update' => $last_update,
		'search_results' => $search_results,
	);
	
}
