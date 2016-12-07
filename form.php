<html>
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="css/styles.css">
		<title>
			Форма
		</title>
	</head>
	<body><div class="forma">
		<form method="post" action="index.php">
		<ul>
		<li>Социальный:	<input type="text", name="soc"><br></li>
		<li>Базовый:	<input type="text", name="base"><br></li>
		<li>Эротика:	<input type="text", name="eros"><br></li>
		<li>Наш футбол:	<input type="text", name="nf"><br></li>
		<li>Премиум футбол: <input type="text", name="pf"><br></li>
		<li>Стрим:	<input type="text", name="strim"><br></li>
		<li>СНГ:<input type="text", name="sng"><br></li>
		<li>Амедиа:	<input type="text", name="amedia"><br></li>
		<li>Детский:<input type="text", name="kind"><br></li>
		<li>Кино:<input type="text", name="kino"><br></li>
		</ul>
		</div>
		Период:<br>
		<input name="period", type="radio", value="month">Месяц<br> 
		<input name="period", type="radio", value="kvartal">Квартал<br> 
		<input name="period", type="radio", value="halfyear">Пол года<br> 
		<input name="period", type="radio", value="year">Год<br> 
		<input name="submit", type="submit", value="Отправить">
		<select name="month">
			<option>Январь</option>
			<option>Февраль</option>
			<option>Март</option>
			<option>Апрель</option>
			<option>Май</option>
			<option>Июнь</option>
			<option>Июль</option>
			<option>Август</option>
			<option>Сентябрь</option>
			<option>Октябрь</option>
			<option>Ноябрь</option>
			<option>Декабрь</option>
		</select>
		<select name="year">
			<option>2015</option>
			<option>2016</option>
			<option>2017</option>
			<option>2018</option>
			<option>2019</option>
			<option>2020</option>
		</select>
		</form>
	</body>
</html>