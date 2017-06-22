<?php
require_once('curl.php');
getList($_GET['id']);
function getList($id) {
	$url = 'http://www.icourse163.org/dwr/call/plaincall/CourseBean.getLastLearnedMocTermDto.dwr';
	$time = time();
	$data = <<<html
callCount=1
scriptSessionId=\${scriptSessionId}190
httpSessionId=54a4fb8d57a9418b98b3e2d62020a28e
c0-scriptName=CourseBean
c0-methodName=getLastLearnedMocTermDto
c0-id=0
c0-param0=number:$id
batchId=$time
html;
	$cookie = 'STUDY_SESS="+vHzBYnt6rNmw6/KXBCJiJLK45fUfX+qGBTL0UQKeYHzZ4rezrllR/fePd4VbmK0d+YrmM4cVpWkReFzdwbvJk16Lb1pb6IX66LUczT6ZNg6WCZ2Oggpp2O5LfS8kRQ5nu4B1ZCqJHetdIDKrjk4V/dNsNCC3EAn0wkxUzcGCCHdNz5i9lFcIuPSeV3m+gdggAd9uMV3AXu6jiU0a69PwA=="';
	$str = curl($url, $data, $cookie);
	$result = preg_replace('/dwr\..*;/', '', $str);
	$result = str_replace('//#DWR-INSERT','',$result);
	$result = str_replace('//#DWR-REPLY','',$result);
	//echo '<script>';
	echo 'function getid(){';
	echo $result;
	//echo '</script>';
}
?>

var data=[];
    s0.chapters.forEach(function(value, index, array) {
        value.lessons.forEach(function(value, index, array) {
            value.units.forEach(function(value, index, array) {
                if (value.contentType === 1) {
						  //console.log(value.contentId, value.id, value.name);
						var tmp=[value.contentId, value.id, value.name];						
						data.push(tmp.join('|'));
                }
            });
        });
    });
	var result=data.join('^');
return result;
}

