<?php
require_once('curl.php');
getList($_GET['id']);
function getList($id) {
	$url = 'http://www.icourse163.org/dwr/call/plaincall/CourseBean.getLastLearnedMocTermDto.dwr';
	$time = time();
	$data = <<<html
callCount=1
scriptSessionId=\${scriptSessionId}190
httpSessionId=1107bb0417e147b29bf73c4486af7021
c0-scriptName=CourseBean
c0-methodName=getLastLearnedMocTermDto
c0-id=0
c0-param0=number:$id
batchId=$time
html;
	$cookie = 'STUDY_SESS="+vHzBYnt6rNmw6/KXBCJiJLK45fUfX+qGBTL0UQKeYHzZ4rezrllR/fePd4VbmK0d+YrmM4cVpWkReFzdwbvJpiR52Q3LezYjCvGzHYR0wo6WCZ2Oggpp2O5LfS8kRQ5/8k9/B7pJNEfhRIAU9u6iHBokslnwALnYV+tl35i/c/dNz5i9lFcIuPSeV3m+gdggAd9uMV3AXu6jiU0a69PwA=="; ';
	$str = curl($url, $data, $cookie);
	$result = preg_replace('/dwr\..*;/', '', $str);
	//echo '<script>';
	echo $result;
	//echo '</script>';
}