<?php

if(isset($res)) {
	if($res > 0) {
		if($res == 1) {
			 echo $res['title'];
		}
		else {
			foreach($res as $row) {
				echo $row['title'] . "<br />";
			}
		}
	} 
}