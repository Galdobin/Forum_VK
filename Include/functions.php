<?php

/// Повторяющиеся в модулях функции.

	/**
	 * Печатаем массив из переменной $_GET.
	 */
	function PrintGET()
	{
		$len = count($_GET);
		echo "Длина массива = $len<br>";
		if (count($_GET) > 0)
		{
			echo '<table><th>Ключ</th><th>Содержание</th>';
			foreach ($_GET as $key => $value)
			{
				PrintRawTwo($key, $value);
			}
			echo '</table>';
		}
	}

	/**
	 * Печать строки таблицы состоящей из двух столбцов
	 * @param type $one Содержание первого столбца
	 * @param type $two Содержание второго столбца
	 */
	function PrintRawTwo($one, $two)
	{
		echo "<tr><td>$one</rd><td>$two</td></tr>";
	}

	/**
	 * Функция печати таблицы с результатом запроса к базе данных
	 * @param Строка $query Строка запроса к базе данных. Пример: "select id as ID, name as 'Название рубрики' from rubrics" 
	 * @param type $goPHP Имя файла цели, в который будет посылаться запрос по клику на указанное в $aField поле
	 * @param type $aField Имя поля для установки линка запроса. Должно совпадать с одним из указанных в $query
	 */
	function PrintQuery($query, $goPHP = '', $aField = '')
	{
		Connect();
		$result = mysql_query($query) or die("Ошибка запроса!<br>");
		echo '<table>';
		foreach (mysql_fetch_assoc($result) as $key => $value)
		{
			echo "<th>$key</th>";
		}
		mysql_data_seek($result, 0);
		while ($row = mysql_fetch_assoc($result))
		{
			echo "<tr>";
			foreach ($row as $key => $value)
			{
				echo '<td>';
				if ($aField == $key)
				{
					echo '<a href="' . $goPHP . '?' . $aField . '=' . $value . '">';
					echo "$value</td></a>";
				}
				else
				{
					echo "$value</td>";
				}
			}
			echo '</tr>';
		}
		echo '</table>';
	}

	/**
	 * Функция печати таблицы по результату запроса с учётом данных массивов линков. Т.е. могут выводиться не все поля из указанных в запросе, а только указанные в $aFields
	 * @param string $query Строка запроса к базе данных. Пример: "select id as ID, name as 'Название рубрики' from rubrics" 
	 * @param array $goPHPs Массив с именем файлов цели, в который будет посылаться запрос по клику на указанное в массиве $aFields поле
	 * @param array $aFields Массив с именем полей для установки линка запроса. Должны совпадать с указанными в $query алиасами полей. Значение $value здесь - содержание GET запроса от этого поля к файлу из $goPHP
	 * @param array $aChange Массив задает из каких полей брать значение ($value) для составления линка запроса по каждому указанному через $key полю
	 */
	function PrintQueryLink($query, $goPHPs, $aFields, $aChange = array('' => ''))
	{
		Connect();
		$result = mysql_query($query) or die("Ошибка запроса к БД<br>");
		echo '<table>';
		foreach (mysql_fetch_assoc($result) as $key => $value)
			if (array_key_exists($key, $aFields))
				echo "<th>$key</th>";
		mysql_data_seek($result, 0); // Из-за того, что прочли названия полей, для печати их заголовков, указатель на таблице сместился на 2-ю запись. Надо его вернуть на начало
		while ($row = mysql_fetch_assoc($result))
		{
			echo '<tr>';
			foreach ($row as $key => $value)
				if (array_key_exists($key, $aFields))
				{  // Если поле задано для отображения в таблице, то полюбому (с линком или без) но мы её будем отображать
					echo '<td>';
					if (array_key_exists($key, $goPHPs))
					{  // Если поле для линка задано, то будем отображать как гиперссылку на файл указанный для него в $goPHP
						if (array_key_exists($key, $aChange))  // Если поле для линка участвует в "подмене" GET запроса в целевой файл php, то будем подменять - иначе: оставим то название поля которое пришло в sql-запросе
							if (array_key_exists($aChange[$key], $row))  // Если поле для замены GET-запроса ошибочно не соответствует существующему в sql-запросе, то передаем в GET текущее имя поля
								echo '<a href="' . $goPHPs[$key] . '?' . $aFields[$key] . '=' . $row[$aChange[$key]] . '">';
							else
								echo '<a href="' . $goPHPs[$key] . '?' . $aFields[$key] . '=' . $value . '">';
						else
							echo '<a href="' . $goPHPs[$key] . '?' . $aFields[$key] . '=' . $value . '">';
						echo "$value</td></a>";
					} else
						echo "$value</td>";
				}
			echo '</tr>';
		}
		echo '</table>';
	}

	/**
	 * Открытие активного соединения с базой данных на локальном сервере.
	 */
	function Connect()
	{
		echo 'Соединяемся с базой данных...<br \>';
		mysql_connect('localhost', 'root', '') or die('Не смогли подключиться к базе данных!<br \>');
		echo 'Соединение с сервером произошло успешно.<br \>';
		$my_db = 'forum';
		mysql_select_db($my_db) or die('Не смогли выбрать базу данных!<br \>');
		echo 'Соединение с базой данных "' . $my_db . '" установлено.<br \>';
		mysql_query("set names utf8");
	}

?>
