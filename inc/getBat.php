<?php
		$b_dir='/bat/';
		if(isset($_POST['data'])){
		unlink('.'.$b_dir.'aria2c.bat');
		$fp=fopen('.'.$b_dir.'aria2c.bat','w+');
		fwrite($fp, $_POST['data']);
		fclose($fp);
		echo 'http://api.orzz.vip/inc'.$b_dir.'aria2c.bat';
		}else echo 'error';