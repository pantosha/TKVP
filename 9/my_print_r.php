<?php
	function print_to_console($var){
		echo "$var";
		if(is_array($var)){
			echo "\n(\n";
			foreach($var as $key => $value){
				echo "[$key] => ";
				print_to_console($value);
				echo "\n";
			}
			echo ")";
		}
	}
	
	function print_to_html($var){
        echo "$var";
		if(is_array($var)){
			echo "\n<ul>\n";
			foreach($var as $key => $value){
				echo "<li>[$key] => ";
				print_to_html($value);
				echo "\n";
			}
			echo "</ul>";
		}
	}
?>