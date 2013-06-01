<?php
	function current_date(){
		// число-месяц-год
		//example: 01-01-1970
		return date('d-m-Y');
	}

	function current_time(){
		// число-месяц-год
		//example: 30.05.2013 20:54
		return (date('d.m.Y H:i'));
	}
	
	function birthday($birthday){
	// возвращает форматированную строку дня рождения
		return date('d-m-Y', $birthday);
	}
	
	function days_before_birthday($birthday){
	// Вход: timestamp дня рождения
	// Выход: число дней до дня рождения
		$current_day = mktime(0, 0, 0, date('n'), date('j'), date('Y'));
		$next_birthday = mktime(0, 0, 0, date('n', $birthday), date('j', $birthday), date('Y')); // ДР в этом году
		
		// Проверяем, в этом году уже был день рождения
		if ($current_day > $next_birthday)
			$next_birthday = mktime(0, 0, 0, date('n', $birthday), date('j', $birthday), date('Y') + 1); // берём день рождения в следующем году
		
		return ceil(abs($next_birthday - $current_day) / 86400);
	}
	
	function lived_days($birthday){
	// Вход: timestamp дня рождения
		$current_day = time();
		$lived_time = $current_day - $birthday;
		
		if ($lived_time <= 0)
			return false;
		
		// годы
		$lived_data["years"] = ceil($lived_time / 31556926) - 1;
		
		// месяцы
		$lived_data["months"] = ceil($lived_time / 2629744) - 1;
		
		// недели
		$lived_data["weeks"] = ceil($lived_time / 657436) - 1;
		
		// дни
		$lived_data["days"] = ceil($lived_time / 86457) - 1;
		
		// часы
		$lived_data["hours"] = ceil($lived_time / 3600) - 1;
		
		// минуты
		$lived_data["minutes"] = ceil($lived_time / 60) - 1;
		
		// секунды
		$lived_data["seconds"] = ceil($lived_time);

		return $lived_data;
	}
?>