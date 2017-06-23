<?php
require_once('curl.php');
getList($_GET['id']);
function getList($id) {
	$url = 'http://www.icourse163.org/dwr/call/plaincall/CourseBean.getLastLearnedMocTermDto.dwr';
	$time = time();
	$data = <<<html
callCount=1
scriptSessionId=\${scriptSessionId}190
httpSessionId=a772cc1c4e264177a1f7408889134b25
c0-scriptName=CourseBean
c0-methodName=getLastLearnedMocTermDto
c0-id=0
c0-param0=number:$id
batchId=$time
html;
	$str = curl($url, $data);
	$result = preg_replace('/dwr\..*;/', '', $str);//将最后一行以dwr开头的代码删除
	echo $result;
}