<link rel="stylesheet" type="text/css" href="View/rubricView.css">
<?php 

// Методом GET принимает параметр id, соответствующий первичному ключу некоторой темы обсуждения.
// Результатом выполнения должно быть:
//	- название темы,
//	- ссылка user.php?id=... на ее автора,
//	- дата создания темы,
//	- список комментариев, с указанием их контента, даты и ссылки на автора.
require_once 'Include/functions.php';
require_once 'View/ViewTables.php';

PrintQuery('select * from topic');
?>
