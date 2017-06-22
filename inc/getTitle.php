<?php
require_once('curl.php');//
getTitle($_GET['id']);
function getTitle($id) {
	$url = 'http://www.icourse163.org/dwr/call/plaincall/CourseBean.getAllAnnouncementByTerm.dwr';
	$time = time();
	$data = <<<html
callCount=1
scriptSessionId=\${scriptSessionId}190
httpSessionId=79c410ddd2ff4c9ba4f5bfb08d07763d
c0-scriptName=CourseBean
c0-methodName=getAllAnnouncementByTerm
c0-id=0
c0-param0=number:$id
c0-param1=number:1
batchId=$time
html;
	$cookie = 'STUDY_SESS="+vHzBYnt6rNmw6/KXBCJiJLK45fUfX+qGBTL0UQKeYHzZ4rezrllR/fePd4VbmK0d+YrmM4cVpWkReFzdwbvJk16Lb1pb6IX66LUczT6ZNg6WCZ2Oggpp2O5LfS8kRQ5nu4B1ZCqJHetdIDKrjk4V/dNsNCC3EAn0wkxUzcGCCHdNz5i9lFcIuPSeV3m+gdggAd9uMV3AXu6jiU0a69PwA=="';
	$str = curl($url, $data, $cookie);
	//$result = preg_replace('/dwr\..*;/', '', $str);
	//echo '<script>';
	echo $result;
	//echo '</script>';
}