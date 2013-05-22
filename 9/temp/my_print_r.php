<?php
	function my_print_r($var){
		echo "$var";
		if(is_array($var)){
			echo "\n(\n";
			foreach($var as $key => $value){
				echo "[$key] => ";
				my_print_r($value);
				echo "\n";
			}
			echo ")\n";
		}
	}
?>