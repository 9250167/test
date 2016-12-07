<?php
include_once 'index.php';
function getLastPeriod ($data_start, $db, $object){
    $query=$db->prepare("SELECT * FROM numerals WhERE id = '$data_start'"); //берем цифры предыдущего периода
    $query->execute();
    $result=$query->fetchALL();
        foreach ($result as $key)
        {
            $arr=$key;
            foreach ($arr as $key => $value)
            {
                    $sr_soc = ($arr['soc'] + $object->soc) / 2;   
                    $sr_base = ($arr['base'] + $object->base) / 2;
                    $sr_eros = ($arr['eros'] + $object->eros) / 2;
                    $sr_nf = ($arr['nf'] + $object->nf) / 2;
                    $sr_pf = ($arr['pf'] + $object->pf) / 2;
                    $sr_strim = ($arr['strim'] + $object->strim) / 2;
                    $sr_sng = ($arr['sng'] + $object->sng) / 2;
                    $sr_amedia = ($arr['amedia'] + $object->amedia) / 2;
                    $sr_kind = ($arr['kind'] + $object->kind) / 2;
                    $sr_kino = ($arr['kino'] + $object->kino) / 2;
                    $startSoc = $arr['soc'];
                    $startBase = $arr['base'];
                    $startEros = $arr['eros'];
                    $startNf = $arr['nf'];
                    $startPf = $arr['pf'];
                    $startStrim = $arr['strim'];
                    $startSng = $arr['sng'];
                    $startAmedia = $arr['amedia'];
                    $startKind = $arr['kind'];
                    $startKino = $arr['kino'];
                    $arr_1 = ["sr_soc"=>$sr_soc, "sr_base"=>$sr_base, "sr_eros"=>$sr_eros, 
                        "sr_nf"=>$sr_nf, "sr_pf"=>$sr_pf, "sr_strim"=>$sr_strim, 
                        "sr_sng"=>$sr_sng, "sr_amedia"=>$sr_amedia, "sr_kind"=>$sr_kind, 
                        "sr_kino"=>$sr_kino, "startSoc"=>$startSoc, "startBase"=>$startBase, 
                        "startEros"=>$startEros, "startNf"=>$startNf, "startPf"=>$startPf, 
                        "startStrim"=>$startStrim, "startSng"=>$startSng, "startAmedia"=>$startAmedia, 
                        "startKind"=>$startKind, "startKino"=>$startKino];
                    return $arr_1;
            }
        }
}
function func_switch ($tt, $st, $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename)	{
    $finish = 2 * $tt - $st;
    if ($minabon > $tt)
    {
            $tt = $minabon;
    }
    $zamenaStart = "<start" . "$c" . " >";
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
    $array = [$summ, $file];
    return $array;
}
function getData ($db, $object, $arr1){
    $query=$db->prepare("SELECT DISTINCT name FROM chanals WhERE period='$object->period'"); //берем список лицензиаров
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
	$file = file_get_contents("tmp/$filename.html");  //открываем шаблон
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
            $file = str_replace("<period>", "$object->month_oridjinal $object->year", $file);  //замена на период
            switch ($type)
            {
                    case 'Социальный':
                            $array = func_switch ($arr1['sr_soc'], $arr1['startSoc'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];
                            break;
                    case 'Базовый':
                            $array = func_switch ($arr1['sr_base'], $arr1['startBase'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];
                            break;
                    case 'Эротика':
                            $array = func_switch ($arr1['sr_eros'], $arr1['startEros'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
                            break;
                    case 'НАШ ФУТБОЛ':
                            $array = func_switch ($arr1['sr_nf'], $arr1['startNf'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
                            break;
                    case 'Премиум Футбол':
                            $array = func_switch ($arr1['sr_pf'], $arr1['startPf'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
                            break;								
                    case 'СтримТВ':
                            $array = func_switch ($arr1['sr_strim'], $arr1['startStrim'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
                            break;
                    case 'СНГ':
                            $array = func_switch ($arr1['sr_sng'], $arr1['startSng'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
                            break;
                    case 'Amedia':
                            $array = func_switch ($arr1['sr_amedia'], $arr1['startAmedia'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
                            break;
                    case 'Детский':
                            $array = func_switch ($arr1['sr_kind'], $arr1['startKind'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
                            break;
                    case 'Кино':
                            $array = func_switch ($arr1['sr_kino'], $arr1['startKino'], $minabon, $minplatej, $fiksplata, $stavka, $c, $file, $filename);
                            $globitogo = $array[0];
                            $file = $array[1];    
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
        file_put_contents("reports/$filename.html", $file);			
    }
}
function months ($object){
    foreach ($object->months as $key => $value)
	{
        if ($object->month_oridjinal == $key)
		{
			$month = $value;
                }
	}
    return $month;
}
