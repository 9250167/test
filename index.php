<?php
mb_internal_encoding("UTF-8");
include_once 'config/classes.php';
include_once 'library/functions.php';
$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
$db = new PDO('mysql:host=localhost; dbname=data', 'root', '', $opt);  //подключение БД
$db->exec("SET NAMES UTF8");  //кодировка БД
$object = new Period();
$object->period = filter_input(INPUT_POST, 'period');
$object->soc = filter_input(INPUT_POST, 'soc', FILTER_VALIDATE_INT);  //переменные из формы
$object->base = filter_input(INPUT_POST, 'base', FILTER_VALIDATE_INT);  
$object->eros = filter_input(INPUT_POST, 'eros', FILTER_VALIDATE_INT);  
$object->nf = filter_input(INPUT_POST, 'nf', FILTER_VALIDATE_INT);  
$object->pf = filter_input(INPUT_POST, 'pf', FILTER_VALIDATE_INT);  
$object->strim = filter_input(INPUT_POST, 'strim', FILTER_VALIDATE_INT);  
$object->sng = filter_input(INPUT_POST, 'sng', FILTER_VALIDATE_INT); 
$object->amedia = filter_input(INPUT_POST, 'amedia', FILTER_VALIDATE_INT); 
$object->kind = filter_input(INPUT_POST, 'kind', FILTER_VALIDATE_INT);  
$object->kino = filter_input(INPUT_POST, 'kino', FILTER_VALIDATE_INT);  
$object->month_oridjinal = filter_input(INPUT_POST, 'month');
$object->year = filter_input(INPUT_POST, 'year');
$object->month = months($object);
$nomber_kvartal = ceil($object->month / 3)." квартал";
$nomber_halfyear = ceil($object->month / 6)." полугодие";
$nomber_year = "$object->year"." год";
$data = $object->year.$object->month; // текущий месяц
$data_month_start = $data - 1; // предыдущий месяц
$data_kvartal_start = $data - 3; // предыдущий квартал
$data_halfyear_start = $data - 6; // предыдущие пол года
$data_year_start = $data - 12; // предыдущий год
$srednee_month = getLastPeriod ($data_month_start, $db, $object);
$srednee_kvartal = getLastPeriod ($data_kvartal_start, $db, $object);
$srednee_halfyear = getLastPeriod ($data_halfyear_start, $db, $object);
$srednee_year = getLastPeriod ($data_year_start, $db, $object);
$month = getData($db, $object, $srednee_month);
