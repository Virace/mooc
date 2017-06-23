<?php
require('../Config.php');
function curl($url, $data) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_TIMEOUT, 20);
	curl_setopt($curl, CURLOPT_ENCODING, 'chunked');
	curl_setopt($curl, CURLOPT_IPRESOLVE, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
	//重点
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Origin: http://www.icourse163.org', 'Content-type: text/plain'));
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_COOKIE, $GLOBALS['cookie']);
	$str = curl_exec($curl);
	curl_close($curl);
	return ($str);
}