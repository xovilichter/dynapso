<?php 

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://www.dynapso.de/xovilichter/"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
#curl_setopt($curl, CURLOPT_USERAGENT, 'Xovilichter.Dynapso/1.0 (+https://github.com/xovilichter/dynapso)');
#curl_setopt($curl, CURLOPT_REFERER, 'https://github.com/xovilichter/dynapso'); 
$output = curl_exec($ch);
curl_close($ch);

preg_match_all('#<td class="right"><span data-sort="(.*)">(.*)</span></td> <td class="link"><span data-sort="(.*)">(.*)</span></td> <td class="googlePlus">(.*)</td>#Uis', $output, $matches);

$search_results = array();

foreach($matches[1] as $n => $position){
	$search_results[] = array(
		'position' => $position,
		'url' => $matches[3][$n],
	);
}

print_r($search_results);
