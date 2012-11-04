<!--<link rel="stylesheet" type="text/css" href="View/rubricView.css">-->
<?php

/**
 * Таблица рубрик с столбцами ID и 'Название рубрики' имеющим ссылки на файл обработки запроса с передающимся полем = 'id' выбранной строчки
 */
function ViewRubric1() {
	$goPHPs = array('ID' => 'rubric.php', 'Название рубрики' => 'rubric.php');
	$aFields = array('ID' => 'id', 'Название рубрики' => 'id'); // Выводить поля ID и 'Название рубрики', как значения GET-запросов от этих полей использовать строку 'id'
	$aChange = array('Название рубрики' => 'ID');
	PrintQueryLink('select id as ID, name as "Название рубрики" from rubrics', $goPHPs, $aFields, $aChange);
	//PrintQueryLink('select id as ID, name as "Название рубрики" from rubrics', array('Название рубрики'=>'rubric.php'), array('Название рубрики'=>'id'), array('Название рубрики'=>'ID'));
}

/**
 * Таблица рубрик с столбцом 'Название рубрики' имеющим ссылки на файл обработки запроса с передающимся полем = 'id' выбранной строчки
 */
function ViewRubric2() {
	$goPHPs = array('Название рубрики' => 'rubric.php');
	$aFields = array('Название рубрики' => 'id');
	$aChange = array('Название рубрики' => 'ID');
	PrintQueryLink('select id as ID, name as "Название рубрики" from rubrics', $goPHPs, $aFields, $aChange);
}

function ViewUser1() {
	$goPHPs = array('ID' => 'user.php');
	$aFields = array('ID' => 'id', 'Имя автора' => 'id', 'Эл. почта автора' => 'id', 'Дата регистрации' => 'id');
	$aChange = array('Название рубрики' => 'ID');
	PrintQueryLink('select id as ID, name as "Имя автора", mail as "Эл. почта автора", date as "Дата регистрации" from users', $goPHPs, $aFields, $aChange);
}

function ViewTopic1()
{
	$goPHPs = array('ID' => 'topic.php');
	$aFields = array('ID' => 'id', 'Имя автора' => 'id', 'Эл. почта автора' => 'id', 'Дата регистрации' => 'id');
	$aChange = array('Название рубрики' => 'ID');
	PrintQueryLink('select id as ID, rubric as "Рубрика", name as "Имя автора", date as "Дата соощения" from topic', $goPHPs, $aFields, $aChange);
}
?>
