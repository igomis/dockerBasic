<?php
function dd($param)
{
    var_dump($param);
    exit();
}

function loadWhoops()
{
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    return $whoops;
}

function ucParagraph(String $text):String
{	
	$result="";
	$token = strtok($text,".");
	while ($token !== false) {
		$result=$result.ucfirst($token);
		$token = strtok(".");
		if ($token !== false) {
			$result.=".";
		}
	}
    return $result;
}

function greetins(String $time = null):String
{
	date_default_timezone_set("Europe/Madrid");
	if (null == $time) {
		$time=date("H:i");
	}
	$dayStart = strtotime("07:00");
	$time = strtotime($time);
	$timeForNight = "00:00";
	$month = date("m");
	if ($month == 1 || $month == 12) {
		$timeForNight = "18:00";
	} else if ($month == 2 || $month == 11) {
		$timeForNight = "19:00";
	}  else if ($month == 5 || $month == 8) {
		$timeForNight = "21:00";
	}  else if ($month == 6 || $month == 7) {
		$timeForNight = "22:00";
	}  else {
		$timeForNight = "20:00";
	} 
	$timeForNight = strtotime($timeForNight);
	
	if ($dayStart <= $time && $time < $timeForNight) {
		return "Bon dia";
	}
	return "Bona nit";
}

function valDate(String $date = null):String
{
	$r = setlocale(LC_ALL, 'ca_ES');
	if ($date == null) {
		$date = date("F j, Y");
	} else {
		DateTime::createFromFormat('Y/m/d', $date);
		if (DateTime::getLastErrors()['warning_count'] > 0 ) {
			return "Bad Format";
		}
		$date = strtotime($date);
	}
	return strftime("%e %B de %Y", $date);
}

function paintLine(Array $lineas):String
{
	$row = '';
	foreach($lineas as $linea) {
		$row.="<td>".$linea."</td>";
	}
    return "<tr>".$row."</tr>";
}

