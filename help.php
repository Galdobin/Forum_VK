<?php


$linkServer = mysql_connect($server, $username, $password);	// Соединяется с сервером. Возвращает линк на соединение или False
mysql_select_db($database_name, $link_identifier);	// Выбирает указанную базу данных по линку на соединение с сервером ($link_identifier). Возвращает True если выбор успешен.
$resultQuery = mysql_query($query, $link_identifier);	// Возвращает результат запроса $query к серверу указанному в линке

$num = mysql_num_rows($resultQuery); // Возвращает число строк в запросе $resQuery

$row = mysql_fetch_assoc($resultQuery); // Возвращает хеш-массив содержащий строку из результата запроса с ключами в виде названий полей полученной таблицы или False - если строчки кончились.
?>
