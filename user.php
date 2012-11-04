<link rel="stylesheet" type="text/css" href="View/rubricView.css">
<?php
// Методом GET принимает параметр id, соответствующий первичному ключу некоторого пользователя.
// Результатом выполнения должна быть информация:
//		о пользователе и статистика о его деятельности (на усмотрение разработчика, например сколько оставлено сообщений и т.д.).
require_once '/Include/functions.php';
require_once '/View/ViewTables.php';

//PrintQuery('select * from users');
ViewUser1();
?>
