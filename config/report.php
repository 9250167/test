<?php
	mb_internal_encoding("UTF-8");
	$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	$db = new PDO('mysql:host=localhost; dbname=data', 'root', 'erfv5671', $opt);  //подключение БД
	$db->exec("SET NAMES UTF8");  //кодировка БД
	$soc = filter_input(INPUT_POST, 'soc', FILTER_VALIDATE_INT);  //переменные из формы
	$base = filter_input(INPUT_POST, 'base', FILTER_VALIDATE_INT);  
	$eros = filter_input(INPUT_POST, 'eros', FILTER_VALIDATE_INT);  
	$nf = filter_input(INPUT_POST, 'nf', FILTER_VALIDATE_INT);  
	$pf = filter_input(INPUT_POST, 'pf', FILTER_VALIDATE_INT);  
	$strim = filter_input(INPUT_POST, 'strim', FILTER_VALIDATE_INT);  
	$sng = filter_input(INPUT_POST, 'sng', FILTER_VALIDATE_INT); 
	$amedia = filter_input(INPUT_POST, 'amedia', FILTER_VALIDATE_INT); 
	$kind = filter_input(INPUT_POST, 'kind', FILTER_VALIDATE_INT);  
	$kino = filter_input(INPUT_POST, 'kino', FILTER_VALIDATE_INT);  
	$period = filter_input(INPUT_POST, 'period');  
	$month_oridjinal = filter_input(INPUT_POST, 'month');
	$year = filter_input(INPUT_POST, 'year');
	$months = array("Январь"=>"01", "Февраль"=>"02", "Март"=>"03", "Апрель"=>"04", "Май"=>"05", "Июнь"=>"06",
	"Июль"=>"07", "Август"=>"08", "Сентябрь"=>"09", "Октябрь"=>"10", "Ноябрь"=>"11", "Декабрь"=>"12");
	foreach ($months as $key => $value)
	{
		if ($month_oridjinal == $key)
		{
			$month = $value;
		}
	}
	if ($period == 'kvartal' && $month == '03')
	{
		$nomber_kvartal = '1 квартал';
	}
	elseif ($period == 'kvartal' && $month == '06')
	{
		$nomber_kvartal = '2 квартал';
	}
	elseif ($period == 'kvartal' && $month == '09')
	{
		$nomber_kvartal = '3 квартал';
	}
	elseif ($period == 'kvartal' && $month == '12')
	{
		$nomber_kvartal = '4 квартал';
	}
	if ($period == 'halfyear' && $month == '06')
	{
		$nomber_halfyear = '1 полугодие';
	}
	elseif ($period == 'halfyear' && $month == '12')
	{
		$nomber_halfyear = '2 полугодие';
	}
	if 	($period == 'year')
	{
		$nomber_year = "$year"." год";
	}
	$data = $year.$month; // текущий месяц
	$data_month_start = $data - 1; // предыдущий месяц
	$data_kvartal_start = $data - 3; // предыдущий квартал
	$data_halfyear_start = $data - 6; // предыдущие пол года
	$data_year_start = $data - 12; // предыдущий год
	$query=$db->prepare("SELECT * FROM numerals WhERE id = '$data_month_start'"); //берем цифры предыдущего месяца
	$query->execute();
	$result=$query->fetchALL();
		foreach ($result as $key)
		{
			$arr=$key;
			foreach ($arr as $key => $value)
			{
				$sr_soc_month = ($arr['soc'] + $soc) / 2;   
				$sr_base_month = ($arr['base'] + $base) / 2;
				$sr_eros_month = ($arr['eros'] + $eros) / 2;
				$sr_nf_month = ($arr['nf'] + $nf) / 2;
				$sr_pf_month = ($arr['pf'] + $pf) / 2;
				$sr_strim_month = ($arr['strim'] + $strim) / 2;
				$sr_sng_month = ($arr['sng'] + $sng) / 2;
				$sr_amedia_month = ($arr['amedia'] + $amedia) / 2;
				$sr_kind_month = ($arr['kind'] + $kind) / 2;
				$sr_kino_month = ($arr['kino'] + $kino) / 2;
				$startSocMonth = $arr['soc'];
				$startBaseMonth = $arr['base'];
				$startErosMonth = $arr['eros'];
				$startNfMonth = $arr['nf'];
				$startPfMonth = $arr['pf'];
				$startStrimMonth = $arr['strim'];
				$startSngMonth = $arr['sng'];
				$startAmediaMonth = $arr['amedia'];
				$startKindMonth = $arr['kind'];
				$startKinoMonth = $arr['kino'];
                        }
		}
	$query=$db->prepare("SELECT * FROM numerals WhERE id = '$data_kvartal_start'"); //берем цифры предыдущего квартала
	$query->execute();
	$result=$query->fetchALL();
		foreach ($result as $key)
		{
			$arr=$key;
			foreach ($arr as $key => $value)
			{
				$sr_soc_kvartal = ($arr['soc'] + $soc) / 2;  
				$sr_base_kvartal = ($arr['base'] + $base) / 2;
				$sr_eros_kvartal = ($arr['eros'] + $eros) / 2;
				$sr_nf_kvartal = ($arr['nf'] + $nf) / 2;
				$sr_pf_kvartal = ($arr['pf'] + $pf) / 2;
				$sr_strim_kvartal = ($arr['strim'] + $strim) / 2;
				$sr_sng_kvartal = ($arr['sng'] + $sng) / 2;
				$sr_amedia_kvartal = ($arr['amedia'] + $amedia) / 2;
				$sr_kind_kvartal = ($arr['kind'] + $kind) / 2;
				$sr_kino_kvartal = ($arr['kino'] + $kino) / 2;
				$startSocKvartal = $arr['soc'];
				$startBaseKvartal = $arr['base'];
				$startErosKvartal = $arr['eros'];
				$startNfKvartal = $arr['nf'];
				$startPfKvartal = $arr['pf'];
				$startStrimKvartal = $arr['strim'];
				$startSngKvartal = $arr['sng'];
				$startAmediaKvartal = $arr['amedia'];
				$startKindKvartal = $arr['kind'];
				$startKinoKvartal = $arr['kino'];
            }
		}	
	$query=$db->prepare("SELECT * FROM numerals WhERE id = '$data_halfyear_start'"); //берем цифры предыдущего полугодия
	$query->execute();
	$result=$query->fetchALL();
		foreach ($result as $key)
		{
			$arr=$key;
			foreach ($arr as $key => $value)
			{
				$sr_soc_halfyear = ($arr['soc'] + $soc) / 2;   
				$sr_base_halfyear = ($arr['base'] + $base) / 2;
				$sr_eros_halfyear = ($arr['eros'] + $eros) / 2;
				$sr_nf_halfyear = ($arr['nf'] + $nf) / 2;
				$sr_pf_halfyear = ($arr['pf'] + $pf) / 2;
				$sr_strim_halfyear = ($arr['strim'] + $strim) / 2;
				$sr_sng_halfyear = ($arr['sng'] + $sng) / 2;
				$sr_amedia_halfyear = ($arr['amedia'] + $amedia) / 2;
				$sr_kind_halfyear = ($arr['kind'] + $kind) / 2;
				$sr_kino_halfyear = ($arr['kino'] + $kino) / 2;
				$startSocHalfyear = $arr['soc'];
				$startBaseHalfyear = $arr['base'];
				$startErosHalfyear = $arr['eros'];
				$startNfHalfyear = $arr['nf'];
				$startPfHalfyear = $arr['pf'];
				$startStrimHalfyear = $arr['strim'];
				$startSngHalfyear = $arr['sng'];
				$startAmediaHalfyear = $arr['amedia'];
				$startKindHalfyear = $arr['kind'];
				$startKinoHalfyear = $arr['kino'];
            }
		}	
	$query=$db->prepare("SELECT * FROM numerals WhERE id = '$data_year_start'"); //берем цифры предыдущего года
	$query->execute();
	$result=$query->fetchALL();
		foreach ($result as $key)
		{
			$arr=$key;
			foreach ($arr as $key => $value)
			{
				$sr_soc_year = ($arr['soc'] + $soc) / 2;   
				$sr_base_year = ($arr['base'] + $base) / 2;
				$sr_eros_year = ($arr['eros'] + $eros) / 2;
				$sr_nf_year = ($arr['nf'] + $nf) / 2;
				$sr_pf_year = ($arr['pf'] + $pf) / 2;
				$sr_strim_year = ($arr['strim'] + $strim) / 2;
				$sr_sng_year = ($arr['sng'] + $sng) / 2;
				$sr_amedia_year = ($arr['amedia'] + $amedia) / 2;
				$sr_kind_year = ($arr['kind'] + $kind) / 2;
				$sr_kino_year = ($arr['kino'] + $kino) / 2;
				$startSocYear = $arr['soc'];
				$startBaseYear = $arr['base'];
				$startErosYear = $arr['eros'];
				$startNfYear = $arr['nf'];
				$startPfYear = $arr['pf'];
				$startStrimYear = $arr['strim'];
				$startSngYear = $arr['sng'];
				$startAmediaYear = $arr['amedia'];
				$startKindYear = $arr['kind'];
				$startKinoYear = $arr['kino'];
            }
		}	
	function func_switch ($tt, $st)
	{
		global $c;
		global $file;
		global $name;
		global $chanal; 
		global $type;
		global $lisenz;
		global $minabon;
		global $stavka;
		global $minplatej;
		global $fiksplata;
		global $r_period;
		$finish = 2 * $tt - $st;
		if ($minabon > $tt)
		{
			$tt = $minabon;
		}
		$zamenaStart = "<start"."$c"." >";
                //var_dump($zamenaStart);
		$zamenaFinish = "<finish"."$c"." >";
		$zamenaMinabon = "<min"."$c"." >";
		$file = str_replace("$zamenaMinabon", "$minabon", $file);
		$file = str_replace("$zamenaStart", "$st", $file);
		$file = str_replace("$zamenaFinish", "$finish", $file);
		$zamenasrednee = "<srednee"."$c"." >";
		$file = str_replace("$zamenasrednee", "$tt", $file);
		$summ = $tt * $stavka;
		if ($minplatej > $summ)
		{
			$summ = $minplatej;
		}
		if ($fiksplata > 0)
		{
			$summ = $fiksplata;
		}
		$nds = ($summ * 18) / 118;
		$zamenasumm = "<summ"."$c"." >";
		$file = str_replace("$zamenasumm", round($summ, 2), $file);
		$zamenands = "<nds"."$c"." >";
		$file = str_replace("$zamenands", round($nds, 2), $file);
		return ($summ);
	}
	
	if ($period == 'month')
	{
		$query=$db->prepare("SELECT DISTINCT name FROM chanals WhERE period='месяц'"); //берем список лицензиаров
		$query->execute();
		$result=$query->fetchALL();
		foreach ($result as $key=>$value)
		{	
			$arr = $value;
			$a = $arr['name'];
			$query=$db->prepare("SELECT * FROM chanals WhERE name = '$a' ORDER BY name"); 
			$query->execute();
			$result=$query->fetchALL();
			$filename = $a;
			$file = file_get_contents("reports/$filename.html");  //открываем шаблон
			$c = 1;
			$summ = 0;
			$itogo = 0;
			$globitogo = 0;
			foreach ($result as $key)
			{
					$arr = $key;
					$name = ($arr['name']);
					$chanal = ($arr['chanal']);
					$type = ($arr['type']);
					$lisenz = ($arr['lisenz']);
					$minabon = ($arr['minabon']);
					$stavka = ($arr['stavka']);
					$minplatej = ($arr['minplatej']);
					$fiksplata = ($arr['fiksplata']);
					$r_period = ($arr['period']);
					$file = str_replace("<lisenz>", $lisenz, $file);
					$zamenakanal = "<kanal"."$c"." >";
					$zamenapaket = "<paket"."$c"." >";
					$zamenastavka = "<stavka"."$c"." >";
					$file = str_replace("$zamenakanal", "$chanal", $file);
					$file = str_replace("$zamenapaket", "$type", $file);
					$file = str_replace("$zamenastavka", "$stavka", $file);
					$file = str_replace("<period>", "$month_oridjinal $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_month, $startSocMonth);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_month, $startBaseMonth);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_month, $startErosMonth);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_month, $startNfMonth);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_month, $startPfMonth);
								break;								
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_month, $startStrimMonth);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_month, $startSngMonth);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_month, $startAmediaMonth);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_month, $startKindMonth);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_month, $startKinoMonth);
								break;								
						}
					
					$c = $c + 1;
					$itogo = $itogo + $globitogo;
					
			}
					
					$zamenaitogo = "<itogo >";
					$file = str_replace("$zamenaitogo", round($itogo, 2), $file);
					$itogonds = ($itogo * 18) / 118;
					$zamenaitogonds = "<itogonds>";
					$file = str_replace("$zamenaitogonds", round($itogonds, 2), $file);
					file_put_contents("finish/$filename.html", $file);			
		}	
	}
	elseif ($period == 'kvartal')
	{
		$query=$db->prepare("SELECT DISTINCT name FROM chanals WhERE period IN('месяц', 'квартал')"); //берем список лицензиаров
		$query->execute();
		$result=$query->fetchALL();	
		foreach ($result as $key=>$value)
		{
			$arr = $value;
			$a = $arr['name'];
			$query=$db->prepare("SELECT * FROM chanals WhERE name = '$a' ORDER BY name"); 
			$query->execute();
			$result=$query->fetchALL();
			$filename = $a;
			$file = file_get_contents("reports/$filename.html");  //открываем шаблон
			$c = 1;
			$summ = 0;
			$itogo = 0;
			$globitogo = 0;
			foreach ($result as $key)
			{
					$arr = $key;
					$name = ($arr['name']);
					$chanal = ($arr['chanal']);
					$type = ($arr['type']);
					$lisenz = ($arr['lisenz']);
					$minabon = ($arr['minabon']);
					$stavka = ($arr['stavka']);
					$minplatej = ($arr['minplatej']);
					$fiksplata = ($arr['fiksplata']);
					$r_period = ($arr['period']);
					$file = str_replace("<lisenz>", $lisenz, $file);
					$zamenakanal = "<kanal"."$c"." >";
					$zamenapaket = "<paket"."$c"." >";
					$zamenastavka = "<stavka"."$c"." >";
					$file = str_replace("$zamenakanal", "$chanal", $file);
					$file = str_replace("$zamenapaket", "$type", $file);
					$file = str_replace("$zamenastavka", "$stavka", $file);
					if ($r_period == 'месяц')
					{	
						$file = str_replace("<period>", "$month_oridjinal $year", $file);  //замена на период
						//var_dump ($year);
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_month, $startSocMonth);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_month, $startBaseMonth);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_month, $startErosMonth);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_month, $startNfMonth);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_month, $startPfMonth);
								break;								
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_month, $startStrimMonth);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_month, $startSngMonth);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_month, $startAmediaMonth);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_month, $startKindMonth);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_month, $startKinoMonth);
								break;								
						}
					}
					elseif ($r_period == 'квартал')
					{
						$file = str_replace("<period>", "$nomber_kvartal $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_kvartal, $startSocKvartal);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_kvartal, $startBaseKvartal);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_kvartal, $startErosKvartal);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_kvartal, $startNfKvartal);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_kvartal, $startPfKvartal);
								break;
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_kvartal, $startStrimKvartal);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_kvartal, $startSngKvartal);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_kvartal, $startAmediaKvartal);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_kvartal, $startKindKvartal);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_kvartal, $startKinoKvartal);	
								break;
						}
					}
					$c = $c + 1;
					$itogo = $itogo + $globitogo;
					
					
			}
				$zamenaitogo = "<itogo >";
					$file = str_replace("$zamenaitogo", round($itogo, 2), $file);
					$itogonds = ($itogo * 18) / 118;
					$zamenaitogonds = "<itogonds>";
					$file = str_replace("$zamenaitogonds", round($itogonds, 2), $file);
					file_put_contents("finish/$filename.html", $file);
		}	
	}
	elseif ($period == 'halfyear')
	{
		$query=$db->prepare("SELECT DISTINCT name FROM chanals WhERE period IN('месяц', 'квартал', 'пол года')"); //берем список лицензиаров
		$query->execute();
		$result=$query->fetchALL();	
		foreach ($result as $key=>$value)
		{
			$arr = $value;
			$a = $arr['name'];
			$query=$db->prepare("SELECT * FROM chanals WhERE name = '$a' ORDER BY name"); 
			$query->execute();
			$result=$query->fetchALL();
			$filename = $a;
			$file = file_get_contents("reports/$filename.html");  //открываем шаблон
			$c = 1;
			$summ = 0;
			$itogo = 0;
			$globitogo = 0;
			foreach ($result as $key)
			{
					$arr = $key;
					$name = ($arr['name']);
					$chanal = ($arr['chanal']);
					$type = ($arr['type']);
					$lisenz = ($arr['lisenz']);
					$minabon = ($arr['minabon']);
					$stavka = ($arr['stavka']);
					$minplatej = ($arr['minplatej']);
					$fiksplata = ($arr['fiksplata']);
					$r_period = ($arr['period']);
					$file = str_replace("<lisenz>", $lisenz, $file);
					$zamenakanal = "<kanal"."$c"." >";
					$zamenapaket = "<paket"."$c"." >";
					$zamenastavka = "<stavka"."$c"." >";
					$file = str_replace("$zamenakanal", "$chanal", $file);
					$file = str_replace("$zamenapaket", "$type", $file);
					$file = str_replace("$zamenastavka", "$stavka", $file);
					if ($r_period == 'месяц')
					{	
						$file = str_replace("<period>", "$month_oridjinal $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_month, $startSocMonth);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_month, $startBaseMonth);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_month, $startErosMonth);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_month, $startNfMonth);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_month, $startPfMonth);
								break;								
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_month, $startStrimMonth);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_month, $startSngMonth);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_month, $startAmediaMonth);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_month, $startKindMonth);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_month, $startKinoMonth);
								break;								
						}
					}
					elseif ($r_period == 'квартал')
					{
						$file = str_replace("<period>", "$nomber_kvartal $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_kvartal, $startSocKvartal);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_kvartal, $startBaseKvartal);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_kvartal, $startErosKvartal);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_kvartal, $startNfKvartal);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_kvartal, $startPfKvartal);
								break;
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_kvartal, $startStrimKvartal);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_kvartal, $startSngKvartal);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_kvartal, $startAmediaKvartal);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_kvartal, $startKindKvartal);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_kvartal, $startKinoKvartal);	
								break;
						}
					}
					elseif ($r_period == 'пол года')
					{
						$file = str_replace("<period>", "$nomber_halfyear $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_halfyear, $startSocHalfyear);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_halfyear, $startBaseHalfyear);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_halfyear, $startErosHalfyear);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_halfyear, $startNfHalfyear);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_halfyear, $startPfHalfyear);	
								break;
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_halfyear, $startStrimHalfyear);
								break;								
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_halfyear, $startSngHalfyear);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_halfyear, $startAmediaHalfyear);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_halfyear, $startKindHalfyear);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_halfyear, $startKinoHalfyear);
								break;
						}
					}
					$c = $c + 1;
					$itogo = $itogo + $globitogo;
					
					
			}
				$zamenaitogo = "<itogo >";
					$file = str_replace("$zamenaitogo", round($itogo, 2), $file);
					$itogonds = ($itogo * 18) / 118;
					$zamenaitogonds = "<itogonds>";
					$file = str_replace("$zamenaitogonds", round($itogonds, 2), $file);
					file_put_contents("finish/$filename.html", $file);
		}	
	}
	elseif ($period == 'year')
	{
		$query=$db->prepare("SELECT DISTINCT name FROM chanals WhERE period IN('месяц', 'квартал', 'пол года', 'год')"); //берем список лицензиаров
		$query->execute();
		$result=$query->fetchALL();	
		foreach ($result as $key=>$value)
		{
			$arr = $value;
			$a = $arr['name'];
			$query=$db->prepare("SELECT * FROM chanals WhERE name = '$a' ORDER BY name"); 
			$query->execute();
			$result=$query->fetchALL();
			$filename = $a;
			$file = file_get_contents("reports/$filename.html");  //открываем шаблон
			$c = 1;
			$summ = 0;
			$itogo = 0;
			$globitogo = 0;
			foreach ($result as $key)
			{
					$arr = $key;
					$name = ($arr['name']);
					$chanal = ($arr['chanal']);
					$type = ($arr['type']);
					$lisenz = ($arr['lisenz']);
					$minabon = ($arr['minabon']);
					$stavka = ($arr['stavka']);
					$minplatej = ($arr['minplatej']);
					$fiksplata = ($arr['fiksplata']);
					$r_period = ($arr['period']);
					$file = str_replace("<lisenz>", $lisenz, $file);
					$zamenakanal = "<kanal"."$c"." >";
					$zamenapaket = "<paket"."$c"." >";
					$zamenastavka = "<stavka"."$c"." >";
					$file = str_replace("$zamenakanal", "$chanal", $file);
					$file = str_replace("$zamenapaket", "$type", $file);
					$file = str_replace("$zamenastavka", "$stavka", $file);
					if ($r_period == 'месяц')
					{	
						$file = str_replace("<period>", "$month_oridjinal $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_month, $startSocMonth);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_month, $startBaseMonth);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_month, $startErosMonth);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_month, $startNfMonth);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_month, $startPfMonth);
								break;								
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_month, $startStrimMonth);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_month, $startSngMonth);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_month, $startAmediaMonth);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_month, $startKindMonth);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_month, $startKinoMonth);
								break;								
						}
					}
					elseif ($r_period == 'квартал')
					{
						$file = str_replace("<period>", "$nomber_kvartal $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_kvartal, $startSocKvartal);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_kvartal, $startBaseKvartal);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_kvartal, $startErosKvartal);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_kvartal, $startNfKvartal);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_kvartal, $startPfKvartal);
								break;
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_kvartal, $startStrimKvartal);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_kvartal, $startSngKvartal);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_kvartal, $startAmediaKvartal);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_kvartal, $startKindKvartal);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_kvartal, $startKinoKvartal);	
								break;
						}
					}
					elseif ($r_period == 'пол года')
					{
						$file = str_replace("<period>", "$nomber_halfyear $year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_halfyear, $startSocHalfyear);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_halfyear, $startBaseHalfyear);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_halfyear, $startErosHalfyear);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_halfyear, $startNfHalfyear);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_halfyear, $startPfHalfyear);	
								break;
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_halfyear, $startStrimHalfyear);
								break;								
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_halfyear, $startSngHalfyear);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_halfyear, $startAmediaHalfyear);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_halfyear, $startKindHalfyear);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_halfyear, $startKinoHalfyear);
								break;
						}
					}
					else
					{
						$file = str_replace("<period>", "$nomber_year", $file);  //замена на период
						switch ($type)
						{
							case 'Социальный':
								$globitogo = func_switch ($sr_soc_year, $startSocYear);
								break;
							case 'Базовый':
								$globitogo = func_switch ($sr_base_year, $startBaseYear);
								break;
							case 'Эротика':
								$globitogo = func_switch ($sr_eros_year, $startErosYear);
								break;
							case 'НАШ ФУТБОЛ':
								$globitogo = func_switch ($sr_nf_year, $startNfYear);
								break;
							case 'Премиум Футбол':
								$globitogo = func_switch ($sr_pf_year, $startPfYear);
								break;
							case 'СтримТВ':
								$globitogo = func_switch ($sr_strim_year, $startStrimYear);
								break;
							case 'СНГ':
								$globitogo = func_switch ($sr_sng_year, $startSngYear);
								break;
							case 'Amedia':
								$globitogo = func_switch ($sr_amedia_year, $startAmediaYear);
								break;
							case 'Детский':
								$globitogo = func_switch ($sr_kind_year, $startKindYear);
								break;
							case 'Кино':
								$globitogo = func_switch ($sr_kino_year, $startKinoYear);
								break;
						}
					}
					$c = $c + 1;
					$itogo = $itogo + $globitogo;
					
					
			}
				$zamenaitogo = "<itogo >";
					$file = str_replace("$zamenaitogo", round($itogo, 2), $file);
					$itogonds = ($itogo * 18) / 118;
					$zamenaitogonds = "<itogonds>";
					$file = str_replace("$zamenaitogonds", round($itogonds, 2), $file);
					file_put_contents("finish/$filename.html", $file);
		}	
	}
?>