<?php
require_once('curl.php');
getUrl($_GET['cid'],$_GET['id']);

function getUrl($cid, $id) {
	$url = 'http://www.icourse163.org/dwr/call/plaincall/CourseBean.getLessonUnitLearnVo.dwr ';
	$time = time();
	$data = <<<html
callCount=1
scriptSessionId=\${scriptSessionId}190
httpSessionId=54a4fb8d57a9418b98b3e2d62020a28e
c0-scriptName=CourseBean
c0-methodName=getLessonUnitLearnVo
c0-id=0
c0-param0=number:$cid
c0-param1=number:1
c0-param2=number:0
c0-param3=number:$id
batchId=$time
html;
	$str = curl($url, $data, '');
	$str= str_replace('?ak', PHP_EOL, $str);
	preg_match_all('/(https|http|ftp)?:\/\/[^\s]+/',$str,$result);
	echo $result[0][5];

	//echo $str;
}